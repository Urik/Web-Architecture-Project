<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Usuario
 * Date: 29/10/12
 * Time: 16:32
 * To change this template use File | Settings | File Templates.
 */
abstract class ModificationView
{
    public abstract function showSelectionPage($members);
    public abstract function showModificationPage($data);
}
