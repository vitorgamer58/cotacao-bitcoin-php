# cotacao-bitcoin-php


Código simples em PHP que faz as solicitações para as exchanges de criptomoedas dos respectivos preços, e então calcula uma média ponderada pelo volume.

Exchanges:

```
Braziliex
Bitcoin Trade
Walltime
Bitcoin to You
Mercado Bitcoin
Novadax
```

Endereço: https://bitcao.notasdovitor.top/cotacao/


![em funcionamento](https://raw.githubusercontent.com/vitorgamer58/cotacao-bitcoin-php/master/img/img.png)


### Instalação
Basta jogar os arquivos dentro de seu servidor php previamente configurado

ver na [wiki](https://github.com/vitorgamer58/cotacao-bitcoin-php/wiki)

### Cache

Se toda vez que um usuário acessar o site o servidor tiver que requisitar às exchanges os preços, ele não será escalável e vai demorar muito para mostrar os preços, podendo ocasionar inclusive o banimento do IP do servidor na api da exchange.
Para resolver isso foi implementado uma solução de cache simples no arquivo run.php na linha 3, que define o tempo de vida do cache.
A resposta das exchanges são armazenadas em arquivos e qualquer outra visita de usuários dentro do tempo de vida, vai usar aquelas informações do cache, permitindo uma escalabilidade maior.
