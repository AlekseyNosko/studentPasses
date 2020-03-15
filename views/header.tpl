<div class="header">
    <div class="logo">
        <h2>Система учета пропусков студентов</h2>
    </div>
    {if is_Auth()}
    <div class="menu">
        <ul>
            <li>{$smarty.cookies.fio}</li>
            <li>|</li>
            <li><a href="../logout.php">выход</a></li>
        </ul>
    </div>
    {/if}
</div>