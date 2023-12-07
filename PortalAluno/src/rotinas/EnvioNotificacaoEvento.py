import mysql.connector
import smtplib
from email.mime.text import MIMEText
from email.mime.multipart import MIMEMultipart
from email.header import Header
import datetime

# Configurações de conexão
config = {
    'user': 'root',
    'password': '',
    'host': 'localhost',
    'database': 'portalaluno',
}

# Conectar ao banco de dados
conexao = mysql.connector.connect(**config)

# Criar um cursor
cursor = conexao.cursor()

# Executar uma consulta
data_atual = datetime.date.today()
data_futura = data_atual + datetime.timedelta(days=3)
data_fim = data_futura + datetime.timedelta(days=1)

consulta = """SELECT DISTINCT
                aluno.RA,
                aluno.email,
                aluno.nome
            FROM
                aluno
            INNER JOIN
                calendario
            ON
                aluno.RA = calendario.ra
            WHERE
                calendario.start >= %s and calendario.start < %s
            GROUP BY
                aluno.RA, aluno.email
            HAVING
                COUNT(calendario.start) > 0;"""
cursor.execute(consulta, (data_futura, data_fim))

# Configurações do servidor SMTP do Gmail
smtp_server = 'smtp.office365.com'
smtp_port = 587
smtp_user = 'tectionportalaluno@outlook.com'
smtp_password = 'Tection@1234'

# Recuperar os resultados
usuarios = cursor.fetchall()

# Exibir os resultados
for usuario in usuarios:
    # Destinatário
    destinatario = usuario[1]

    # Nome e e-mail do remetente
    nome_remetente = 'Portal do Aluno'
    remetente = smtp_user

    # Criar uma mensagem de e-mail
    mensagem = MIMEMultipart()
    mensagem['From'] = f'{Header(nome_remetente, "utf-8")} <{remetente}>'
    mensagem['To'] = destinatario
    mensagem['Subject'] = 'Eventos'

    consulta = "SELECT * FROM calendario WHERE ra = " + str(usuario[0]) + " AND calendario.start >= %s and calendario.start < %s"
    cursor.execute(consulta, (data_futura, data_fim))
    eventos = cursor.fetchall()

    # Corpo do e-mail
    corpo_email = f"""
   <!DOCTYPE html>
        <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Eventos próximos</title>
    </head>
    <body style='font-family: Arial, sans-serif; font-size: 15px;'>

    <!-- Cabeçalho do E-mail -->
    <header style=' background-color: #0073e6; color: #ffffff; text-align: center; padding: 20px;'>
       
        <h1>Eventos do Calendário</h1>
    </header>

    <main style='max-width: 600px;margin,0 auto; padding: 20px;'>
        <h3>Olá {usuario[2].split()[0]},</h3>
        <p><strong> Fique atento!</strong>. Em 3 dias os seguintes eventos irão acontecer: </p>
        <ul style='list-style-type: none;'>
        
    """

    for evento in eventos:
        data_formatada = evento[5].strftime('%d/%m/%Y %H:%M:%S')
        corpo_email += f"""
            <li>
            <strong>Nome do Evento: </strong> {evento[2]} <br>
            <strong>Descrição: </strong> {evento[3]}<br> 
            <strong>Início: </strong>{data_formatada} <br>
            <br>
            </li>
        """

    corpo_email += """
        </ul>
        
        <p>Para mais informações consulte o calendário no portal do aluno</p>
    </main>

    <!-- Rodapé do E-mail -->
        <p>Atenciosamente,<br>
        EducaFoco <br>
    </footer>

    </body>
    </html>
    """
    
    mensagem.attach(MIMEText(corpo_email, 'html'))
    
    # Conectar ao servidor SMTP
    try:
        servidor_smtp = smtplib.SMTP(smtp_server, smtp_port)
        servidor_smtp.starttls()
        servidor_smtp.login(smtp_user, smtp_password)

        # Enviar o e-mail
        servidor_smtp.sendmail(remetente, destinatario, mensagem.as_string())
        print(f'E-mail enviado com sucesso para {destinatario}!')

        # Encerrar a conexão com o servidor SMTP
        servidor_smtp.quit()

    except Exception as e:
        print(f'Erro ao enviar o e-mail para {destinatario}: {str(e)}')

# Fechar o cursor e a conexão
cursor.close()
conexao.close()