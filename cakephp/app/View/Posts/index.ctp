<!-- File: /app/View/Posts/index.ctp -->

<h1>Posts do Blog</h1>
<?php echo $this->Html->link('Add Post', array('action' => 'add')); ?>
<table>
	<tr>
		<th>Id</th>
		<th>Título</th>
            <th>Ação</th>
		<th>Data de Criação</th>
	</tr>

	<!-- Aqui é onde nós percorremos nossa matriz $posts, imprimindo
         as informações dos posts  -->

    <?php foreach ($posts as $post): ?>
    <tr>
    	<td><?php echo $post['Post']['id']; ?></td>
    	<td>
    		<?php echo $this->Html->link($post['Post']['title'], array('action' => 'view', $post['Post']['id'])); ?>
    	</td>
        <td>
            <?php echo $this->Form->postLink(
                'Delete',
                array('action' => 'delete', $post['Post']['id']),
                array('confirm' => 'Está certo dissoammm ?')
            ) ?>
            <?php echo $this->Html->link('Edit', array('action' => 'edit', $post['Post']['id'])); ?>
        </td>
    	<td> <?php echo $post['Post']['created']; ?> </td>
    </tr>
<?php endforeach; ?>
</table>