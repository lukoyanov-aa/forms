<?php
use yii\helpers\Url;
$url = Url::toRoute(['admin/add-portal-auth']);
//echo

$js = <<<JS
        $(document).ready(function () {
		 
		BX24.init(function(){                    
                    var authParams = BX24.getAuth(), 
                            params = authParams
                            params = array_merge({operation: 'add_portal_auth'}, authParams),
                            params = array_merge(params, {})
                    $.ajax({
                            url: "$url",
                            data: params,
                            type: 'POST',
                            success:function(data){                                
                                var answer = JSON.parse(data);
                                if (answer.status == 'error') {                                    
                                    console.log('error', answer.result);
                                    //curapp.displayErrorMessage('К сожалению, произошла ошибка сохранения списка участников рейтинга. Попробуйте перезапустить приложение', ['#error']);
                                }
                                else {
                                    //console.log('success', 'Можно считать всё хорошо');
                                    //BX24.callBind('ONAPPUNINSTALL', 'http://www.b24go.com/rating/application.php?operation=uninstall');
                                    BX24.installFinish();
                                }
                            },
                            error:function(res){
                                console.log('ERR');
                                },

                        }
                    );
		}
            );
        });
JS;
        $this->registerJs($js);
?>
<script type="text/javascript" src="//api.bitrix24.com/api/v1/"></script>