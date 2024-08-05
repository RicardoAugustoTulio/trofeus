<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Troféus IFPR</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 20px;
        }
        h1 {
            color: #2c3e50;
        }
        h2 {
            color: #34495e;
        }
        code {
            color: #ffffff;
            padding: 2px 4px;
            border-radius: 4px;
            font-size: 90%;
        }
        pre {
            background-color: #000000;
            color: #ffffff;
            padding: 10px;
            border-radius: 4px;
            overflow-x: auto;
        }
        a {
            color: #3498db;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Troféus IFPR</h1>
    <p>Bem-vindo ao <strong>Troféus IFPR</strong>! Este documento fornece instruções para configurar e executar o projeto em sua máquina local. Siga os passos abaixo para configurar o ambiente e iniciar o projeto.</p>
    <h2>Requisitos</h2>
    <p>Antes de começar, verifique se você tem as seguintes ferramentas instaladas:</p>
    <ul>
        <li><strong>XAMPP 8.2</strong> com <strong>PHP 8.2</strong></li>
        <li><strong>Node.js v20.15</strong></li>
        <li><strong>Yarn 1.22.22</strong></li>
        <li><strong>Composer 2</strong></li>
    </ul>
  <ul>
    <li>
      <strong>Instale as Dependências PHP</strong>
      <p>Execute o Composer para instalar as dependências PHP do projeto:</p>
      <pre><code>composer install</code></pre>
    </li>
  <li>
    <strong>Instale as Dependências Node.js</strong>
    <p><em>Execute:</em></p>
    <pre><code>npm install</code></pre>
  </li>
  <li>
    <strong>Compile os Recursos Frontend</strong>
  <pre><code>npm run dev</code></pre>
  </li>
  <li>
  <strong>Configure o Banco de Dados</strong>
  <p>Execute as migrações do banco de dados:</p>
  <pre><code>php artisan migrate</code></pre>
  <p><em>Insira dados de homologação no banco de dados:</em></p>
  <pre><code>php artisan db:seed</code></pre>
  </li>
  <li>
  <strong>Inicie o Servidor</strong>
  <p>Finalmente, inicie o servidor de desenvolvimento:</p>
  <pre><code>php artisan serve</code></pre>
  <p>O servidor estará disponível em <code>http://localhost:8000</code>
  <br/>
  (Caso a porta não esteja disponível, o servidor será iniciado na próxima porta disponível).</p>
  </li>
  </ul>
</body>
</html>
