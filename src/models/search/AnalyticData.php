<?php
/**
 * /app/runtime/giiant/e0080b9d6ffa35acb85312bf99a557f2
 *
 * @package default
 */


namespace eluhr\analytics\ui\models\search;

use eluhr\analytics\ui\models\AnalyticData as AnalyticDataModel;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * AnalyticData represents the model behind the search form about `eluhr\analytics\ui\models\AnalyticData`.
 */
class AnalyticData extends AnalyticDataModel
{

    /**
     *
     * @inheritdoc
     * @return array
     */
    public function rules()
    {
        return [
            [['type', 'data'], 'safe'],
        ];
    }


    /**
     *
     * @inheritdoc
     * @return array
     */
    public function scenarios()
    {
        return Model::scenarios();
    }


    /**
     * Creates data provider instance with search query applied
     *
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = AnalyticDataModel::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['type' => $this->type]);
        $query->andFilterWhere(['LIKE', 'data', $this->data]);

        if (!\Yii::$app->request->get($dataProvider->sort->sortParam)) {
            $query->orderBy(['created_at' => SORT_DESC]);
        }

        return $dataProvider;
    }
}
