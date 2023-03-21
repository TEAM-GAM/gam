

const mysql = require('mysql2');

const connection = mysql.createConnection({
  host: 'estoquesites.mysql.dbaas.com.br',
  user: 'estoquesites',
  password: 'Estoque@123',
  database: 'estoquesites'
});
// Conecte-se ao banco de dados MySQL
connection.connect((err) => {
  if (err) {
    console.error('Erro ao se conectar ao banco de dados:', err);
    return;
  }
  console.log('Conectado ao banco de dados MySQL.');
});

// Execute uma consulta SQL
connection.query('SELECT movimentos FROM usuarios WHERE ID = 15 ORDER BY RAND() LIMIT 1', (err, results) => {
  if (err) {
    console.error('Erro ao executar a consulta SQL:', err);
    return;
  }
  console.log('Resultados da consulta:', results);
});

// Feche a conexão com o banco de dados MySQL quando terminar de usá-la
connection.end();



const express = require('express');
const app = express();
const bodyParser = require('body-parser');
app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());
const WebSocket = require('ws');


const http = require('http');
const { spawn } = require('child_process');

const server = http.createServer((req, res) => {
  if (req.url === '/mapa.php' || req.url === '/mapa.php?direita=true' || req.url === '/mapa.php?esquerda=true') {
    // Execute o arquivo PHP usando o módulo child_process.spawn()
    const php = spawn('php', ['mapa.php']);

    // Capturar a saída do arquivo PHP
    let output = '';
    php.stdout.on('data', (data) => {
      output += data;
    });

    // Quando o processo PHP for encerrado, enviar a saída como resposta ao cliente
    php.on('close', () => {
      res.writeHead(200, {'Content-Type': 'text/html'});
      res.end(output);
    });
  } else {
    // Se a URL solicitada não for a página principal, envie uma resposta de erro ao cliente
    res.writeHead(404, {'Content-Type': 'text/plain'});
    res.end('Página não encontrada');
  }
});

server.listen(8093, () => {
  console.log('Servidor rodando na porta 8093');
});





  


const wss = new WebSocket.Server({ server });

