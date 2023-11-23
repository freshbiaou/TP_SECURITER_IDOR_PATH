<?php $data = $context['ticket'] ?>
<div style="margin: 10px auto; width: 75%">
    <div class="contenu">
        <button class="btn bg-success" type="submit" name="envoyer"><?= (get_status($data['statut'])['class']) ?></button>
        <span class="design" style="padding:0 3%"><?= $data['sujet']; ?></span>
    </div>
    <div>
        <?php foreach ($context['messages'] as $message) : ?>
            <div class="messageries design" style="border: 5px groove ; border-radius: 8px;">
                <div class="font-tchat d-flex justify-content-between">
                    <span style="float:left;">
                <?= '<img src="/assets/img/user.jpg" alt="" class="img-user">'. '  ' . $message['created_at'] . ' '; ?></span>
                    <span style="font-size: 14px; font-family:'Times New Roman', Times, serif;">
                        Par <?php echo $message['user']['nom'] . ' ' . $message['user']['prenom'] ?>
                    </span>
                    <?= $message['user_id'] == $current_user['id'] ?
                        "<a href=\"/message/destroy/" . $message['id'] . " \" class=\"btn bg-danger color-white\">Supprimer</a>" :
                        null; ?>
                </div>
                <h6 style="font-size: initial; margin: 2px auto"><?= $message['message'] ?></h6>
            </div>
        <?php endforeach ?>
    </div>
</div>

<div class="auto_formulaire">
    <form method="post" action="/message/store">
        <?php if (session('error', false) || session('success', 0)) : ?>
            <div class="p-2 mx-2 bg-<?= session('success', false) ? 'success' : 'danger' ?>">
                <?= session('success') ?? session('error') ?>
            </div>
        <?php endif ?>
        <input type="hidden" name="ticket_id" value="<?= $data['id'] ?>">
        <label for="messag"></label>
        <textarea name="message" rows="5" cols="40" placeholder="Ecrivez votre message ici"></textarea><br>
        <input type="submit" name="xender" value="Envoyer" class="btn bg-info">
    </form>
    <section id="messages"></section>
</div>