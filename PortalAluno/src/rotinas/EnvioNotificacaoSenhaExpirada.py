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

# Calcular a data atual e a data futura 
data_atual = datetime.date.today()

# Executar uma consulta
consulta = """SELECT DISTINCT
                aluno.RA,
                aluno.email,
                aluno.nome,
                aluno.data_expiracao_senha
            FROM
                aluno
            WHERE
                aluno.data_expiracao_senha <= %s
            GROUP BY
                aluno.RA, aluno.email
            HAVING
                COUNT(aluno.data_expiracao_senha) > 0;"""
cursor.execute(consulta, (data_atual,))

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
    mensagem['Subject'] = 'Senha Expirada'

    # Corpo do e-mail
    data_expiracao = usuario[3].strftime('%d/%m/%Y %H:%M:%S')
    corpo_email = f"""
        <!DOCTYPE html>
        <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Notificação de Senha Expirada</title>
        </head>
        <body style="font-family: Arial, sans-serif;">

            <div style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 5px;">
                
                <h2 style="color: #333;">Notificação de Senha Expirada</h2>
                
                <p>Olá {usuario[2].split()[0]},</p>
                
                <p>Este é um lembrete de que sua senha expirou.</p>
                <p>Por favor, acesse o portal do aluno para altera-la.</p>
                
                <p><strong>Data de Expiração:</strong> {data_expiracao}</p>
                
                <p>Se você já atualizou sua senha recentemente, por favor, ignore esta mensagem.</p>
                
                <p>Obrigado,</p>
                <p>EducaFoco </p>
            
            </div>

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
