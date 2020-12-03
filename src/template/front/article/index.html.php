<?php $this->getHeader(); ?>
<h1>Lista artykułów</h1>
<table>
    <tr>
        <td>Tytuł</td>
        <td>Data dodania</td>
        <td>Autor</td>
        <td>Kategoria</td>
        <td>&nbsp;</td>
    </tr>
    <?php foreach($this->articles as $item): ?>
        <tr>
            <td><a href="<?php echo $this->generateUrl('article/one', array('id' => $item['id'])); ?>"><?php echo $item['title']; ?></a></td>
            <td><?php echo $item['date_add']; ?></td>
            <td><?php echo $item['author']; ?></td>
            <td><?php echo $item['name']; ?></td>
            <?php if (\BlogMVC\Helper\Auth::getUser()->id) : ?>
                <td><a href="<?php echo $this->generateUrl('article/delete', array('id' => $item['id'])); ?>">usuń</a></td>
             <?php endif; ?>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php $this->getFooter(); ?>
