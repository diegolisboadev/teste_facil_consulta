# Teste Facil Consulta

O Projeto consiste em uma API Rest para gerir dados entre as entidades:

-   Medicos
-   Pacientes
-   Cidades

## Inicialização do Projeto e Instruções

-   Dê um git clone
-   composer install
-   ./vendor/bin/sail up
-   ./vendor/bin/sail artisan migrate --seed

-   Mapei os endpoints atraves do routes/api.php
-   As rotas se iniciam com ex.: http://localhost/api/v1/
-   Ou realize o download do .json do Postman na raiz do projeto
    -   [API Projeto - Postman]()

## Observações

-   No item 3.2.3. Vincular paciente e médico.

    -   Foi pedido para adicionar ao body da requisição os parâmetros medico_id (com o ID do médico) e
        paciente_id (com o ID do paciente).
    -   Realizei uma pequena alteração alteração nesse quesito, na qual removi o campo medico_id da inserção na
        tabela de relacionamento medico_paciente no backend, pois como estou utilizando o metodo syncWithoutDetaching()
        o mesmo já capturar esse parametro (valor do campo) da URL e setar no campo especifico da tabela.

-   Rota de login: /api/v1/login
-   Rota de logout: /api/v1/logout

## Licença

O Projeto está sob a licença open source [MIT license](https://opensource.org/licenses/MIT).
