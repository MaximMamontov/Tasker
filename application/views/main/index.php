<div style="border: 5px solid black">
    <form action='' method="post">
        <p>Task name</p>
        <p><input type="text" name="name"></p>
        <p>Task description</p>
        <p><textarea name="description"></textarea></p>
        <p><select name="status">
                <option>TODO</option>
                <option>DOING</option>
                <option>DONE</option>
            </select></p>
        <b><input type="submit" style="background-color: green; border-radius: 40%; color: aliceblue" value="+"></b>
    </form>
</div>

<div class="container" style="margin-top:50px ">
    <?php foreach ($news as $val): ?>
        <script>
            $(document).ready(function () {
                $('a#link<?php echo $val['id'] ?>').click(function (e) {
                    $(this).toggleClass('active');
                    $('#content<?php echo $val['id'] ?>').toggle(300);
                    e.stopPropagation();
                });
                $('#content<?php echo $val['id'] ?>').click(function (e) {
                    e.stopPropagation();
                });
                $('body').click(function () {
                    var link = $('a#link<?php echo $val['id'] ?>');
                    if (link.hasClass('active')) {
                        link.click();
                    }
                });
            });
        </script>
    <?php if ($val['status'] == 'TODO'): ?>
        <div class="task-todo">
            <span class="status"><p><?php echo $val['status'] ?></p></span>
            <h6>#<?php echo $val['id'] ?></h6>
            <h3><?php echo $val['name'] ?></h3>
            <p><?php echo $val['description'] ?></p>
            <div class="settings">
                <a id="link<?php echo $val['id'] ?>" href="#">Set</a>
                <div id="content<?php echo $val['id'] ?>" style="display: none">
                    <form action='' method="post">
                        <p>Task name</p>
                        <p><input type="text" name="changeName"></p>
                        <p>Task description</p>
                        <p><input type="text" name="changeDescription"></p>
                        <p><select name="changeStatus">
                                <option>TODO</option>
                                <option>DOING</option>
                                <option>DONE</option>
                            </select></p>
                        <input type="hidden" name="changeID" value="<?php echo $val['id'] ?>">
                        <b><input type="submit" value="Y"></b>
                    </form>
                    <form method="post">
                        <input type="hidden" name="deleteline" value="<?php echo $val['id'] ?>">
                        <input type="submit" value="X" style="background-color: red">
                    </form>
                </div>
            </div>
            <div class="comments">
                <form action="" method="post">
                    <textarea name="comment"></textarea>
                    <input type="hidden" name="addCommentTaskID" value="<?php echo $val['id'] ?>">
                    <b><input type="submit" value="c+"></b>
                </form>
            </div>
            <?php for ($i = 0;
                       $i < count($comments);
                       ++$i): ?>
                <?php if ($comments[$i]['task_id'] == $val['id']): ?>
                    <i><?php echo $comments[$i]['text'] ?></i><br><hr>
                <?php endif; ?>
            <?php endfor; ?>
        </div>
    <?php endif; ?>
    <?php if ($val['status'] == 'DOING'): ?>
        <div class="task-doing">
            <span class="status"><p><?php echo $val['status'] ?></p></span>
            <h6>#<?php echo $val['id'] ?></h6>
            <h3><?php echo $val['name'] ?></h3>
            <p><?php echo $val['description'] ?></p>
            <div class="settings">
                <a id="link<?php echo $val['id'] ?>" href="#">Set</a>
                <div id="content<?php echo $val['id'] ?>" style="display: none">
                    <form action='' method="post">
                        <p>Task name</p>
                        <p><input type="text" name="changeName"></p>
                        <p>Task description</p>
                        <p><input type="text" name="changeDescription"></p>
                        <p><select name="changeStatus">
                                <option>TODO</option>
                                <option>DOING</option>
                                <option>DONE</option>
                            </select></p>
                        <input type="hidden" name="changeID" value="<?php echo $val['id'] ?>">
                        <b><input type="submit" value="Y"></b>
                    </form>
                    <form method="post">
                        <input type="hidden" name="deleteline" value="<?php echo $val['id'] ?>">
                        <input type="submit" value="X" style="background-color: red">
                    </form>
                </div>
            </div>
            <div class="comments">
                <form action="" method="post">
                    <textarea name="comment"></textarea>
                    <input type="hidden" name="addCommentTaskID" value="<?php echo $val['id'] ?>">
                    <b><input type="submit" value="c+"></b>
                </form>
            </div>
            <?php for ($i = 0;
                       $i < count($comments);
                       ++$i): ?>
                <?php if ($comments[$i]['task_id'] == $val['id']): ?>
                    <i><?php echo $comments[$i]['text'] ?></i><br><hr>
                <?php endif; ?>
            <?php endfor; ?>
        </div>
    <?php endif; ?>
    <?php if ($val['status'] == 'DONE'): ?>
        <div class="task-done">
            <span class="status"><p><?php echo $val['status'] ?></p></span>
            <h6>#<?php echo $val['id'] ?></h6>
            <h3><?php echo $val['name'] ?></h3>
            <p><?php echo $val['description'] ?></p>
            <div class="settings">
                <a id="link<?php echo $val['id'] ?>" href="#">Set</a>
                <div id="content<?php echo $val['id'] ?>" style="display: none">
                    <form action='' method="post">
                        <p>Task name</p>
                        <p><input type="text" name="changeName"></p>
                        <p>Task description</p>
                        <p><input type="text" name="changeDescription"></p>
                        <p><select name="changeStatus">
                                <option>TODO</option>
                                <option>DOING</option>
                                <option>DONE</option>
                            </select></p>
                        <input type="hidden" name="changeID" value="<?php echo $val['id'] ?>">
                        <b><input type="submit" value="Y"></b>
                    </form>
                    <form method="post">
                        <input type="hidden" name="deleteline" value="<?php echo $val['id'] ?>">
                        <input type="submit" value="X" style="background-color: red">
                    </form>
                </div>
            </div>
            <div class="comments">
                <form action="" method="post">
                    <textarea name="comment"></textarea>
                    <input type="hidden" name="addCommentTaskID" value="<?php echo $val['id'] ?>">
                    <b><input type="submit" value="c+"></b>
                </form>
            </div>
            <?php for ($i = 0;
                       $i < count($comments);
                       ++$i): ?>
                <?php if ($comments[$i]['task_id'] == $val['id']): ?>
                    <i><?php echo $comments[$i]['text'] ?></i><br><hr>
                <?php endif; ?>
            <?php endfor; ?>
        </div>
    <?php endif; ?>
    <?php endforeach; ?>
</div>
<?php //foreach ($comments as $comval): ?>
<!--    <p>--><?php //echo $comval['text'] ?><!--</p>-->
<!--    <p>--><?php //echo $comval['task_id'] ?><!--</p>-->
<!--    <hr>-->
<?php //endforeach; ?>






