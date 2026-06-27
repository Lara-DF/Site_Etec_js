<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$mensagem = "";
$tipo = "";

// Variáveis
$nome = "";
$email = "";
$telefone = "";
$assunto = "";
$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $telefone = trim($_POST['telefone'] ?? '');
    $assunto = trim($_POST['assunto'] ?? '');
    $msg = trim($_POST['mensagem'] ?? '');
    $aceite = isset($_POST['aceite']);

    if (empty($nome)) {
        $mensagem = "Por favor, informe seu nome.";
        $tipo = "erro";
    } elseif (strlen($nome) < 3) {
        $mensagem = "O nome deve possuir pelo menos 3 caracteres.";
        $tipo = "erro";
    } elseif (empty($email)) {
        $mensagem = "Por favor, informe seu e-mail.";
        $tipo = "erro";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $mensagem = "Informe um e-mail válido.";
        $tipo = "erro";
    } elseif (empty($assunto)) {
        $mensagem = "Selecione um assunto.";
        $tipo = "erro";
    } elseif (empty($msg)) {
        $mensagem = "Digite uma mensagem.";
        $tipo = "erro";
    } elseif (strlen($msg) < 10) {
        $mensagem = "A mensagem deve possuir pelo menos 10 caracteres.";
        $tipo = "erro";
    } elseif (!$aceite) {
        $mensagem = "Você deve aceitar a Política de Privacidade.";
        $tipo = "erro";
    } else {
        $tipo = "sucesso";
        
        if ($tipo == "sucesso") {
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envio Confirmado</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        body {
            background: #f0f4f8;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        .success-box {
            background: #fff;
            max-width: 600px;
            width: 100%;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            text-align: center;
        }
        .icon-wrapper {
            width: 70px;
            height: 70px;
            background: #e1f5fe;
            color: #0288d1;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 32px;
            margin: 0 auto 20px;
        }
        h1 {
            color: #1a237e;
            font-size: 26px;
            margin-bottom: 10px;
        }
        .sub {
            color: #757575;
            margin-bottom: 30px;
        }
        .info-group {
            text-align: left;
            background: #f8f9fa;
            border-top: 4px solid #0288d1;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
        }
        .info-row {
            margin-bottom: 12px;
            font-size: 15px;
            color: #37474f;
        }
        .info-row:last-child {
            margin-bottom: 0;
        }
        .info-row strong {
            color: #1a237e;
            display: inline-block;
            width: 90px;
        }
        .message-content {
            background: #fff;
            padding: 12px;
            border-radius: 6px;
            border: 1px solid #e0e0e0;
            margin-top: 8px;
            color: #455a64;
        }
        .btn-back {
            display: inline-block;
            padding: 12px 30px;
            background: #0288d1;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            transition: background 0.2s;
        }
        .btn-back:hover {
            background: #01579b;
        }
    </style>
</head>
<body>

<div class="success-box">
    <div class="icon-wrapper">✓</div>
    <h1>Formulário Recebido!</h1>
    <p class="sub">Seus dados foram processados com sucesso interna e externamente.</p>

    <div class="info-group">
        <div class="info-row"><strong>Nome:</strong> <?php echo htmlspecialchars($nome); ?></div>
        <div class="info-row"><strong>E-mail:</strong> <?php echo htmlspecialchars($email); ?></div>
        <div class="info-row"><strong>Telefone:</strong> <?php echo htmlspecialchars($telefone); ?></div>
        <div class="info-row"><strong>Assunto:</strong> <?php echo htmlspecialchars($assunto); ?></div>
        <div class="info-row">
            <strong>Mensagem:</strong>
            <div class="message-content"><?php echo nl2br(htmlspecialchars($msg)); ?></div>
        </div>
    </div>

    <a href="eteczl.html" class="btn-back">Voltar ao Início</a>
</div>

</body>
</html>
<?php
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Contato</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        body {
            background: #1e293b;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        .container {
            width: 100%;
            max-width: 600px;
            background: #fff;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
        }
        h1 {
            text-align: center;
            color: #0f172a;
            margin-bottom: 30px;
            font-size: 28px;
        }
        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 6px;
            font-weight: 600;
            color: #334155;
            font-size: 14px;
        }
        input, select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 15px;
            transition: all 0.3s;
            background: #f8fafc;
        }
        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #0288d1;
            background: #fff;
            box-shadow: 0 0 0 4px rgba(2, 136, 209, 0.15);
        }
        textarea {
            resize: vertical;
            min-height: 120px;
        }
        small {
            display: block;
            min-height: 18px;
            color: #e11d48;
            margin-top: 4px;
            font-size: 13px;
        }
        .is-error {
            border-color: #e11d48 !important;
            background: #fff1f2;
        }
        .is-valid {
            border-color: #10b981 !important;
            background: #f0fdf4;
        }
        #charCount {
            text-align: right;
            font-size: 12px;
            color: #64748b;
            margin-top: 2px;
        }
        .near-limit {
            color: #f59e0b !important;
        }
        .at-limit {
            color: #e11d48 !important;
            font-weight: bold;
        }
        .checkbox {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin: 20px 0 10px;
        }
        .checkbox input {
            width: auto;
            margin-top: 3px;
            cursor: pointer;
        }
        .checkbox label {
            margin: 0;
            cursor: pointer;
            font-weight: normal;
        }
        button {
            width: 100%;
            padding: 14px;
            background: #0288d1;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            transition: background 0.2s;
            margin-top: 10px;
        }
        button:hover {
            background: #01579b;
        }
        button:disabled {
            opacity: .6;
            cursor: not-allowed;
        }
        button.loading::after {
            content: "...";
            animation: pulse .8s infinite;
        }
        @keyframes pulse {
            0% { opacity: 0; }
            50% { opacity: 1; }
            100% { opacity: 0; }
        }
        .btn-voltar {
            display: block;
            text-align: center;
            margin-top: 12px;
            background: #64748b;
            color: #fff;
            text-decoration: none;
            padding: 12px;
            border-radius: 8px;
            font-size: 15px;
            transition: background 0.2s;
        }
        .btn-voltar:hover {
            background: #475569;
        }
        .mensagem {
            padding: 14px;
            border-radius: 8px;
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
            font-size: 14px;
        }
        .sucesso {
            background: #d1fae5;
            color: #065f46;
        }
        .erro {
            background: #fee2e2;
            color: #991b1b;
        }
        .mensagem i {
            margin-right: 6px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Fale Conosco</h1>

    <?php if (!empty($mensagem)): ?>
        <div class="mensagem <?php echo $tipo; ?>">
            <?php if ($tipo == "sucesso"): ?>
                <i class="fas fa-check-circle"></i>
            <?php else: ?>
                <i class="fas fa-exclamation-triangle"></i>
            <?php endif; ?>
            <?php echo htmlspecialchars($mensagem); ?>
        </div>
    <?php endif; ?>

    <form id="contactForm" method="POST">
        <label for="nome">Nome Completo</label>
        <input type="text" id="nome" name="nome" placeholder="Digite seu nome" value="<?php echo htmlspecialchars($_POST['nome'] ?? ''); ?>">
        <small id="erro-nome"></small>

        <label for="email">Endereço de E-mail</label>
        <input type="text" id="email" name="email" placeholder="exemplo@email.com" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
        <small id="erro-email"></small>

        <label for="telefone">Telefone / WhatsApp</label>
        <input type="text" id="telefone" name="telefone" placeholder="(11) 99999-9999" value="<?php echo htmlspecialchars($_POST['telefone'] ?? ''); ?>">
        <small>&nbsp;</small>

        <label for="assunto">Qual o motivo do contato?</label>
        <select id="assunto" name="assunto">
            <option value="">Selecione uma opção</option>
            <option value="Dúvida" <?php if (($_POST['assunto'] ?? '') == 'Dúvida') echo 'selected'; ?>>Dúvida</option>
            <option value="Sugestão" <?php if (($_POST['assunto'] ?? '') == 'Sugestão') echo 'selected'; ?>>Sugestão</option>
            <option value="Elogio" <?php if (($_POST['assunto'] ?? '') == 'Elogio') echo 'selected'; ?>>Elogio</option>
            <option value="Reclamação" <?php if (($_POST['assunto'] ?? '') == 'Reclamação') echo 'selected'; ?>>Reclamação</option>
        </select>
        <small id="erro-assunto"></small>

        <label for="mensagem">Mensagem</label>
        <textarea id="mensagem" name="mensagem" maxlength="500" placeholder="Escreva sua mensagem aqui..."><?php echo htmlspecialchars($_POST['mensagem'] ?? ''); ?></textarea>
        <div id="charCount"><?php echo strlen($_POST['mensagem'] ?? ''); ?> / 500</div>
        <small id="erro-mensagem"></small>

        <div class="checkbox">
            <input type="checkbox" id="aceite" name="aceite" <?php if (isset($_POST['aceite'])) echo "checked"; ?>>
            <label for="aceite">Estou de acordo com a Política de Privacidade.</label>
        </div>
        <small id="erro-aceite"></small>

        <button type="submit" id="submitBtn">Enviar Mensagem</button>
        <a href="eteczl.html" class="btn-voltar">Voltar ao início</a>
    </form>
</div>

<?php if ($tipo == "sucesso"): ?>
<script>
    var usuarioNome = "<?php echo htmlspecialchars($nome); ?>";
    alert("Obrigado, " + usuarioNome + "!\nSeus dados foram recebidos.");
</script>
<?php endif; ?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('contactForm');
    const charCount = document.getElementById('charCount');
    const mensagem = document.getElementById('mensagem');
    const telefone = document.getElementById('telefone');
    const submitBtn = document.getElementById('submitBtn');

    const MAX_CHARS = 500;

    mensagem.addEventListener('input', () => {
        let len = mensagem.value.length;
        if (len > MAX_CHARS) {
            mensagem.value = mensagem.value.slice(0, MAX_CHARS);
            len = MAX_CHARS;
        }
        charCount.textContent = `${len} / ${MAX_CHARS}`;
        charCount.classList.toggle('near-limit', len >= 400 && len < MAX_CHARS);
        charCount.classList.toggle('at-limit', len >= MAX_CHARS);
    });

    telefone.addEventListener('input', () => {
        let v = telefone.value.replace(/\D/g,'');
        if(v.length > 11) v = v.slice(0,11);
        if(v.length > 10) v = v.replace(/^(\d{2})(\d{5})(\d{4})$/, '($1) $2-$3');
        else if(v.length > 6) v = v.replace(/^(\d{2})(\d{4})(\d+)$/, '($1) $2-$3');
        else if(v.length > 2) v = v.replace(/^(\d{2})(\d+)$/, '($1) $2');
        telefone.value = v;
    });

    const rules = {
        nome: v => !v.trim() ? 'O preenchimento do nome é obrigatório.' : v.trim().length < 3 ? 'O nome precisa ter 3 ou mais caracteres.' : '',
        email: v => !v.trim() ? 'O e-mail é obrigatório.' : !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v) ? 'Digite um endereço de e-mail válido.' : '',
        assunto: v => !v ? 'Escolha um assunto.' : '',
        mensagem: v => !v.trim() ? 'A mensagem não pode ficar vazia.' : v.trim().length < 10 ? 'A mensagem deve conter ao menos 10 caracteres.' : '',
        aceite: c => !c ? 'Você precisa aceitar os termos para prosseguir.' : ''
    };

    function setFieldState(el, msg) {
        const err = document.getElementById('erro-' + el.id);
        el.classList.toggle('is-error', !!msg);
        el.classList.toggle('is-valid', !msg);
        if(err) err.textContent = msg;
        return !msg;
    }

    ['nome','email','assunto','mensagem'].forEach(id => {
        const el = document.getElementById(id);
        el.addEventListener('blur', () => {
            setFieldState(el, rules[id](el.value));
        });
    });

    function validateAll() {
        let ok = true;
        ['nome','email','assunto','mensagem'].forEach(id => {
            const el = document.getElementById(id);
            if(!setFieldState(el, rules[id](el.value))) ok = false;
        });

        const aceite = document.getElementById('aceite');
        const erroAceite = document.getElementById('erro-aceite');
        const msg = rules.aceite(aceite.checked);
        erroAceite.textContent = msg;
        if(msg) ok = false;

        return ok;
    }

    form.addEventListener('submit', function(e) {
        if(!validateAll()) {
            e.preventDefault();
            const first = form.querySelector('.is-error');
            if(first) first.focus();
            return;
        }
        submitBtn.disabled = true;
        submitBtn.classList.add('loading');
    });
});
</script>
</body>
</html>