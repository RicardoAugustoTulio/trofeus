<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrofeuSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run()
  {
    DB::table('trofeus')->insert([
      [
        'id' => 1,
        'nome' => 'Produto 1',
        'campus_id' => 1,
        'ano' => 2024,
        'colocacao' => 1,
        'status_id' => 1,
        'obs' => 'Sem observações',
        'url_imagem' => 'images/1720480641.jpg',
        'historia' => '<title>História da Conquista do Produto 1 em 2024</title>
                <style>
                  body {
                    font-family: Arial, sans-serif;
                    font-size: 16px;
                  }
                  h1 {
                    font-size: 24px;
                    font-weight: bold;
                    margin-bottom: 20px;
                  }
                  h2 {
                    font-size: 20px;
                    font-weight: bold;
                    margin-bottom: 10px;
                  }
                  p {
                    margin-bottom: 10px;
                  }
                  ul {
                    list-style-type: none;
                    padding-left: 0;
                  }
                  li {
                    margin-bottom: 5px;
                  }
                  .destaque {
                    background-color: #FFFF00;
                    padding: 5px;
                    margin-bottom: 10px;
                  }
                </style>
                <h1>História da Conquista do Produto 1 em 2024</h1>
                <h2>Relevância da Premiação</h2>
                <p>O Produto 1 é o prêmio máximo do basquetebol universitário brasileiro, concedido aos campeões do Campeonato Nacional Universitário.</p>
                <h2>O Caminho para o Título</h2>
                <p>A equipe do IFPR-Curitiba se preparou meticulosamente para o campeonato, com treinamentos intensos e estratégias bem definidas.</p>
                <h2>A Vitória</h2>
                <p>Na final, o IFPR-Curitiba superou uma equipe adversária de alto nível, conquistando o título com uma vitória esmagadora.</p>
                <h2>Impacto e Legado</h2>
                <div class="destaque">
                  <ul>
                    <li>Elevação do perfil do campus IFPR-Curitiba</li>
                    <li>Inspiração para alunos e funcionários</li>
                    <li>Testemunho do espírito competitivo e da busa pela excelência</li>
                    <li>Solidificação do IFPR-Curitiba como uma potência no basquetebol universitário brasileiro</li>
                  </ul>
                </div>
                <p>A conquista do Produto 1 em 2024 foi um marco histórico para o IFPR-Curitiba, deixando um legado duradouro de sucesso e orgulho.</p>',
        'created_at' => '2024-07-08 23:16:25',
        'updated_at' => '2024-07-29 17:22:38',
        'modalidade_id' => 2,
      ],
      [
        'id' => 2,
        'nome' => 'Produto 2',
        'campus_id' => 1,
        'ano' => 2024,
        'colocacao' => 2,
        'status_id' => 1,
        'obs' => 'Sem observações',
        'url_imagem' => 'images/1721839634.png',
        'historia' => '**História do Troféu Produto 2 de 2024**

                No ano de 2024, o IFPR-Curitiba sagrou-se vice-campeão no Torneio Produto 2, um prestigiado evento esportivo universitário para estudantes de educação física. A conquista foi particularmente significativa para o campus e para os atletas envolvidos.

                **Relevância da Premiação**

                O Troféu Produto 2 é um reconhecimento ao talento e à dedicação dos estudantes-atletas brasileiros. Ele é concedido anualmente aos melhores times de voleibol masculino e feminino da categoria universitária. A conquista representa uma honra para os vencedores e é um atestado da qualidade do ensino e da preparação esportiva oferecida pela instituição.

                **Modalidade e Campus**

                O IFPR-Curitiba obteve a segunda colocação na modalidade voleibol masculino. O time é composto por atletas talentosos que treinaram arduamente sob a orientação técnica de experientes professores. A conquista é uma prova do comprometimento da instituição com o esporte universitário e do alto padrão de formação de seus alunos.

                **Destaques da Conquista**

                Durante o torneio, o time do IFPR-Curitiba demonstrou garra, determinação e habilidade técnica. Os atletas superaram adversários difíceis e chegaram à final com grande confiança. Embora tenham ficado com o vice-campeonato, a conquista foi celebrada como uma vitória devido ao esforço e ao espírito esportivo demonstrados em quadra.

                **Observações**

                A história do Troféu Produto 2 de 2024 é um relato de sucesso e reconhecimento para o IFPR-Curitiba. A conquista inspira futuras gerações de atletas e reforça a importância do esporte na formação integral dos estudantes.',
        'created_at' => '2024-07-08 23:16:25',
        'updated_at' => '2024-07-24 16:47:15',
        'modalidade_id' => 1,
      ],
      [
        'id' => 3,
        'nome' => 'Produto 3',
        'campus_id' => 1,
        'ano' => 2021,
        'colocacao' => 3,
        'status_id' => 1,
        'obs' => 'Sem observações',
        'url_imagem' => 'images/1721839634.png',
        'historia' => '<title>Conquista do Produto 3 em 2021</title>
                <style>
                  body {
                    font-family: Arial, sans-serif;
                    font-size: 16px;
                  }
                  h1 {
                    font-size: 24px;
                    margin-bottom: 10px;
                  }
                  h2 {
                    font-size: 18px;
                    margin-bottom: 10px;
                  }
                  ul {
                    list-style-position: inside;
                    list-style-type: disc;
                    padding-left: 20px;
                  }
                  strong {
                    font-weight: bold;
                  }
                </style>
                <h1>Conquista do Produto 3 em 2021</h1>
                <h2>Destaque e Relevância da Premiação</h2>
                <p>Em 2021, o Produto 3 conquistou o honroso <strong>3º lugar</strong> no <strong>Campeonato Brasileiro de Voleibol Universitário</strong>. Esta conquista é um marco na história do voleibol do Instituto Federal do Paraná, campus Curitiba (IFPR-Curitiba).</p>
                <p>O Campeonato Brasileiro de Voleibol Universitário é um dos torneios mais competitivos do país, reunindo as melhores equipes universitárias. O resultado alcançado pelo Produto 3 demonstra o alto nível técnico da equipe e a dedicação de seus atletas e comissão técnica.</p>
                <h2>Modalidade e Campus</h2>
                <p>O Produto 3 é uma equipe de <strong>voleibol masculino</strong> do <strong>IFPR-Curitiba</strong>. A equipe treina e compete no campus do instituto, localizado no bairro Rebouças, em Curitiba.</p>
                <h2>História do Troféu</h2>
                <p>A história do Troféu Produto 3 remonta ao ano de 2006, quando a equipe conquistou o seu primeiro título estadual. Desde então, o Produto 3 tem se consolidado como uma das melhores equipes universitárias do Paraná, acumulando diversos títulos e conquistas ao longo dos anos.</p>
                <h2>Informações Adicionais</h2>
                <ul>
                  <li><strong>Colocação:</strong> 3º lugar</li>
                  <li><strong>Observações:</strong> Sem observações</li>
                </ul>',
        'created_at' => '2024-07-08 23:16:25',
        'updated_at' => '2024-08-04 20:39:41',
        'modalidade_id' => 1,
      ],
      [
        'id' => 4,
        'nome' => 'Produto 4',
        'campus_id' => 1,
        'ano' => 2024,
        'colocacao' => 4,
        'status_id' => 1,
        'obs' => 'Descrição curta do Produto 4',
        'url_imagem' => 'images/1721839634.png',
        'historia' => null,
        'created_at' => '2024-07-08 23:16:25',
        'updated_at' => '2024-08-04 20:39:53',
        'modalidade_id' => 1,
      ],
      [
        'id' => 5,
        'nome' => 'Produto 5',
        'campus_id' => 1,
        'ano' => 2024,
        'colocacao' => 5,
        'status_id' => 1,
        'obs' => 'Sem observações',
        'url_imagem' => 'images/1721839634.png',
        'historia' => null,
        'created_at' => '2024-07-08 23:16:25',
        'updated_at' => '2024-07-08 23:16:25',
        'modalidade_id' => 1,
      ],
      [
        'id' => 6,
        'nome' => 'Produto 6',
        'campus_id' => 1,
        'ano' => 2024,
        'colocacao' => 6,
        'status_id' => 1,
        'obs' => 'Sem observações',
        'url_imagem' => 'images/1721839634.png',
        'historia' => null,
        'created_at' => '2024-07-08 23:16:25',
        'updated_at' => '2024-07-08 23:16:25',
        'modalidade_id' => 1,
      ],
    ]);
  }
}
