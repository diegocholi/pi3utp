<!-- Modal Adiciona novo aluno na edição-->
<?php
if (isset($_SESSION['user']))
{
    ?>

    <!--    Modal Edita alunos equipe-->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="javascript:void(0)" href="#">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLongTitle"></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                    </div>
                    <div class="modal-footer">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
}
else
{
    header('Location: ../login.php');
}
