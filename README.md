
# 🐝 Sistema de Gerenciamento de Apiários - **AppArio**

Este projeto é um sistema web desenvolvido com **Laravel** com o objetivo de facilitar o gerenciamento de apiários e dados relacionados à apicultura, como pessoas responsáveis, usuários, colmeias e endereços.

---

## 🚀 Tecnologias Utilizadas

- PHP 8.2+
- Laravel 10/11
- PostgreSQL (via Supabase)
- Blade (views)
- Eloquent ORM

---

## 📦 Funcionalidades principais

- Cadastro de usuários e pessoas
- Vinculação entre usuários e pessoas (1:1)
- Gerenciamento de apiários por pessoa (1:N)
- Registro de endereços vinculados à pessoa e ao apiário
- Autenticação de usuários
- Controle de acesso baseado no usuário logado
- Relacionamentos organizados com `hasMany`, `belongsTo` e `chaperone()` para otimização de desempenho

---

## 📂 Estrutura de Models (resumo)

| Model            | Relacionamentos                                                                 |
|------------------|----------------------------------------------------------------------------------|
| Pessoa           | belongsTo `Usuario`, hasMany `Apiario`, hasMany `EnderecoPessoa`                |
| Usuario          | hasOne `Pessoa`                                                                 |
| Apiario          | belongsTo `Pessoa`, hasMany `EnderecoApiario`                                   |
| EnderecoPessoa   | belongsTo `Pessoa`                                                              |
| EnderecoApiario  | belongsTo `Apiario`                                                             |

Utiliza o método `->chaperone()` em relacionamentos `hasMany` para otimizar consultas e evitar o problema de N+1 ao acessar o pai (`Pessoa`) a partir do filho (`Apiario`).

---

## 🧠 Observações

- O sistema foi projetado com base em boas práticas do Laravel e princípios de modelagem relacional.
- Utiliza Supabase como banco de dados PostgreSQL em nuvem.
- Todos os relacionamentos entre entidades foram aplicados com atenção à integridade referencial.

---

## 📚 Licença

Este projeto é de uso acadêmico e livre para fins de estudo, pesquisa e aprendizado
