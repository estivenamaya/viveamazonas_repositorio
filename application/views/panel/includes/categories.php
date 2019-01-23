<!-- Popup content -->
<div class="popup-content">

</div>
<div class="general-popup">
    <h3 class="title-popup">Categorias</h3>
    <div class="content-bottom-popup">
        <div class="scroll-items">
            <article id="item_category_0" class="content-list-category">
                <h5 class="dad-category">Categorias principales</h5>
                <div id="content_items_0">
                    <?
                        for ($i=0; $i < count($categorias); $i++){ ?>

                            <div id="1" class="item-category father_0"><?= $categorias[$i]['nombre'] ?>
                                <div  class="div_click father_0" style="width: 100%; height: 100%;" onclick="showCategories(<?= $categorias[$i]['id_categoria'] ?>, '<?= $categorias[$i]['nombre'] ?>', this)"></div>
                                <i onclick="showModifyPanel(<?= $categorias[$i]['id_categoria'] ?>)" class="fa fa-pencil edit-category-btn" aria-hidden="true"></i>
                                <i onclick="deleteCategory(<?= $categorias[$i]['id_categoria'] ?>, 0);" class="fa fa-trash delete-category" aria-hidden="true"></i></div>
                            <div class="modify_cat_content" id="modify_<?= $categorias[$i]['id_categoria'] ?>">
                                <input type= "hidden" id= "modify_new_cat_<?= $categorias[$i]['id_categoria'] ?>" value = "0">
                                <input class="modify_new_cat_name" type="text" value="<?= $categorias[$i]['nombre'] ?>" id="modify_new_name_cat_<?= $categorias[$i]['id_categoria'] ?>">
                                <i onclick="modifyCategory(<?= $categorias[$i]['id_categoria'] ?>);" class="fa fa-floppy-o" aria-hidden="true"></i>
                            </div>

                        <? }
                    ?>
                </div>
                <div>
                    <input id="category-f-0" type="hidden" value="0" name="category-f">
                    <input id="category-n-0" type="text" name="category-n-0" placeholder="Añadir categoria">
                    <i onclick="addCategory(0);" class="fa fa-plus" aria-hidden="true"></i>
                </div>
            </article>
        </div>
    </div>
</div>
<!-- End popup -->