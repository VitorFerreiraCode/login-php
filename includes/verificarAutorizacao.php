<?php
session_start();

function negar_acesso() {
    header("Location: ../../acesso_negado.php");
    exit;
};

function verificar_autorizacao($niveis_permitidos) {
    if (!isset($_SESSION['usuario_nivel']) || !in_array($_SESSION['usuario_nivel'], $niveis_permitidos)) {
        header("Location: ../../acesso_negado.php");
        exit;
    }
};

function autPresidencia() {
    verificar_autorizacao([
        'Diretor Presidente', 
        'Vice-Presidente', 
        'Dev'
    ]);
};

function autProjetos() {
    verificar_autorizacao([
        'Diretor Presidente', 
        'Vice-Presidente de Operações', 
        'Vice-Presidente de Relações e Estratégias', 
        'Diretor de Recursos Humanos', 
        'Diretor de Projetos', 
        'Diretor de Infraestrutura e Tecnologia', 
        'Assessor de Projetos',  
        'Dev'
    ]);
};

function autFinancas() {
    verificar_autorizacao([
        'Diretor Presidente', 
        'Vice-Presidente de Operações', 
        'Vice-Presidente de Relações e Estratégias', 
        'Diretor de Finanças', 
        'Diretor de Projetos', 
        'Dev'
    ]);
};

function autRH() {
    verificar_autorizacao([
        'Diretor Presidente',
        'Vice-Presidente',
        'Diretor de Recursos Humanos',
        'Diretor Financeiro',
        'Diretor de Projetos',
        'Dev'
    ]);
};

function autMembros() {
    verificar_autorizacao([
        'Diretor Presidente', 
        'Vice-Presidente', 
        'Diretor de Recursos Humanos', 
        'Diretor Financeiro', 
        'Diretor de Projetos', 
        'Diretor de Marketing', 
        'Assessor de Projetos', 
        'Membro', 
        'Dev'
    ]);
};