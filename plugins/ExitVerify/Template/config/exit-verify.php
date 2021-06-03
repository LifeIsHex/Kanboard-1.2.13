<div class="form-columns"> <!-- new by mahdi hezaveh # -->
    <div class="form-column">
        <?php
        echo $this->form->radio('verify_exit', t('Enable "Exit Verification"'), 1,
            isset($values['verify_exit']) && $values['verify_exit'] == 1);
        echo $this->form->radio('verify_exit', t('Disable "Exit Verification"'), 0,
            isset($values['verify_exit']) && $values['verify_exit'] == 0)
        ?>
    </div>
</div>