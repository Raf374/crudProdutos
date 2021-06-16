create database Produtos;
use Produtos

create table if not exists tbProdutos(
    codigo int(10) not null auto_increment,
    nome varchar(100) not null, 
    descrição varchar (200),
    quantidade int(100),
    valor_unitario money,
    data_entrada date,
    imagem longblob,
    primary key (codigo)
);