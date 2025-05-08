# SkillForge - Catálogo de Cursos em PHP

## Visão Geral do Projeto

Este projeto é uma aplicação PHP que funciona como um catálogo de diversos cursos. Os usuários podem visualizar uma lista de cursos, ver informações detalhadas sobre cada curso, filtrar cursos por categoria e gerenciar dados de cursos através de uma área protegida.

## Funcionalidades

- **Catálogo de Cursos**: Exibe uma lista de cursos com imagens, títulos e categorias.
- **Detalhes do Curso**: Cada curso possui uma página dedicada mostrando informações detalhadas.
- **Filtragem**: Os usuários podem filtrar cursos por categoria em `filtro.php`.
- **Autenticação de Usuário**: Um sistema de login restringe o acesso à área protegida (`login.php` e `protected.php`).
- **Área Protegida**: Usuários autenticados podem adicionar novos cursos e visualizar a lista de cursos cadastrados em `protected.php`.

## Estrutura de Arquivos

```
php-catalogo-cursos
├── data
│   └── items.php
├── includes
│   ├── footer.php
│   └── header.php
├── functions
│   └── helpers.php
├── styles.css
├── index.php
├── details.php
├── filtro.php
├── login.php
├── protected.php
├── README.md
└── .gitignore
```

## Instruções de Configuração

1. **Clone o repositório** ou baixe os arquivos do projeto para sua máquina local.
2. **Certifique-se de ter um servidor local** (como XAMPP, WAMP ou MAMP) rodando PHP.
3. **Coloque a pasta do projeto** no diretório raiz do servidor (por exemplo, `htdocs` para XAMPP).
4. **Acesse a aplicação** navegando para `http://localhost/php-catalogo-cursos/index.php` no seu navegador.
