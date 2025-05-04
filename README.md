# Sistema de Login – Template Genérico

Este repositório fornece um **template de autenticação** pronto para ser acoplado a qualquer projeto PHP simples – sem frameworks nem Composer.  A estrutura é enxuta, baseada em pastas bem definidas e arquivos autossuficientes.

## 📂 Estrutura de Pastas

```text
├── assets/                 # Front‑end estático
│   ├── css/                # Estilos (styles.css …)
│   ├── js/                 # Scripts (validação, toggle‑password …)
│   └── img/                # Logos, ícones, favicons
│
├── include/                # Helpers reutilizáveis
│   ├── conexao.php         # Função getPDO() – conecta ao MySQL (PDO, SSL opcional)
│   └── verificarAutorizacao.php # Apenas verifica se tem cargo suficiente para acessar
│
├── login/                  # Fluxo de autenticação
│   ├── login.php           # Tela de login (formulário HTML + CSS)
│   ├── autenticar.php      # Processa POST ⇒ valida credenciais ⇒ cria $_SESSION
│   └── logout.php          # Destroi sessão e redireciona para login.php
│
├── acesso_negado.php       # Página 403 genérica
├── index.php               # Exemplo de página protegida (require verificarAutorizacao.php)
└── README.md               # Este guia
```

> **Dica:**  mantenha `assets/` e `include/` fora de qualquer diretório público se o servidor permitir; use *DocumentRoot* apontando para uma pasta `public/` com symlink para `assets/` se quiser reforçar segurança.

## 🛠️ Configuração Rápida

1. **Clone** o repositório ou copie as pastas para o seu projeto.
2. Ajuste as variáveis de conexão em `include/conexao.php`:
3. Ligue o servidor embutido para testes:
   ```bash
   php -S 0.0.0.0:8000
   ```
4. Acesse `http://localhost:8000/login/login.php`.

## 🔑 Fluxo de Autenticação (passo a passo)

1. **login.php** exibe o formulário e envia `POST /login/autenticar.php`.
2. **autenticar.php**
   - Sanitiza `email` e `senha`.
   - Consulta o banco (`SELECT senha_hash FROM usuarios WHERE email = ?`).
   - `password_verify()` → cria `$_SESSION['user']` e `$_SESSION['role']`.
   - `header('Location: /index.php');`
3. **index.php** (página protegida)
   - Inclui `include/verificarAutorizacao.php`.
   - Função `verificarPermissao(['membro'])` redireciona para `acesso_negado.php` se não logado.
4. **logout.php** destroi a sessão e volta ao login.

## 🎨 Personalização

- **Logo & Cores:** troque `assets/img/imagem.png` e ajuste variáveis no topo do `login.php`.
- **Regras de permissão:** edite `verificarAutorizacao.php` (ex.: admin, editor…).

## 🚀 Como integrar noutro projeto

1. Copie **assets/**, **include/** e **login/** para a raiz do seu app.
2. Inclua `include/verificarAutorizacao.php` nas páginas que precisarem de login.
   ```php
   <?php
   require __DIR__.'/include/verificarAutorizacao.php';
   autNome();  // padrão: precisa estar logado
   ?>
   ```
3. Ajuste rotas/links caso seu projeto use sub‑pastas ou rewrite via `.htaccess`.

## 🤝 Contribuições

Pull Requests são bem‑vindos! Se encontrar bug ou quiser melhorar UX, abra uma _issue_.



