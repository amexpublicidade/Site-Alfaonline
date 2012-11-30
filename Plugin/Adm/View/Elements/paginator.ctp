<?PHP if ($this->Paginator->hasPage(2)): ?>
    <nav class="paginator">
        <?PHP
        echo $this->Paginator->prev("« anterior");
        echo $this->Paginator->numbers(array('separator' => false));
        echo $this->Paginator->next('próxima »');
        ?>
    </nav>
<?PHP endif; ?>