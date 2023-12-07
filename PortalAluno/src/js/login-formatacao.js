addEventListener('DOMContentLoaded', () => {
    formatarLogin()
})

const formatarLogin = () => {
    formatarSenha()
    formatarCPF()

    function formatarSenha() {
        const $senhaMostrarSVG = document.querySelector('.js-senha-mostrar-svg')
        const $senhaEsconderSVG = document.querySelector('.js-senha-esconder-svg')
        const $senhaCampo = document.querySelector('.js-senha-campo')
        
        // mostra e esconde senha
        $senhaEsconderSVG.addEventListener('click', () => {
            svgVisibilidadeToggle()
    
            $senhaCampo.type == "password" ?
                $senhaCampo.type = "text" :
                $senhaCampo.type = "password"
        })
        
        // altera svg de olho
        function svgVisibilidadeToggle() {
            $senhaMostrarSVG.classList.toggle('opacity-0')
            $senhaEsconderSVG.classList.toggle('opacity-0')
        }
    }

    function formatarCPF() {
        const $cpfCampo = document.querySelector('.js-campo-cpf')

        if (! $cpfCampo) {
            return
        }

        $cpfCampo.addEventListener('input', atualizarCampo)

        // formata o CPF
        function formatar(cpf) {
            cpf = cpf.replace(/\D/g, '')
                .replace(/(\d{3})(\d)/, '$1.$2')
                .replace(/(\d{3})(\d)/, '$1.$2')
                .replace(/(\d{3})(\d{1,2})$/, '$1-$2')
            return cpf
        }

        // atualiza o campo
        function atualizarCampo() {
            const $cpfCampo = document.querySelector('.js-campo-cpf')
            const cpfFormatado = formatar($cpfCampo.value)
            $cpfCampo.value = cpfFormatado
        }
    }
}
