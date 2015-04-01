<?php
/**
 * Created by PhpStorm.
 * User: Marussia
 * Date: 31.03.2015
 * Time: 16:12
 */
use yii\grid\GridView;
?>
<?= GridView::widget([
    'dataProvider' => $provider,
    'filterModel' => $searchModel,
    'columns' => [
        'login',
        'email',
        [
            'attribute' => 'lastname',
            'value' => 'persons.lastname',
        ],
        [
            'attribute' => 'firstname',
            'value' => 'persons.firstname',
        ],
        [
            'attribute' => 'middlename',
            'value' => 'persons.middlename',
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update} {delete}',
        ]

    ],
]); ?>