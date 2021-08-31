# api_foco

Projeto desenvolvido para fins de avaliação de habilidades para a função de Desenvolvedor PHP na empresa Foco Multimídia.

Rotas da Api:

  GET: 
    localhost/api/v1/produtos   (lista todos os produtos)
    localhost/api/v1/produtos/{tipo}   (lista os produtos pelo tipo inserido)
    localhost/api/v1/produtos/{nome}   (lista os produtos pelo nome)
    localhost/api/v1/produtos/{valor}  (lista os produtos pelo preço)
    localhost/api/v1/produtos/{filtro}/{quantidade} (lista todos os produtos pelo filtro e recebe a quanidade adquirida. Também retorna o total da compra e imposto pago)

  POST:
    localhost/api/v1/produtos  (Recebe dados via POST e insere no banco de dados. Chaves: nome, tipo, preco, imposto)
  

