<div id="comments">
	<!-- token for post forms -->
	<span id="token" token-value="<?php echo csrf_token() ?>"></span>
	<!-- tiken for post forms -->
	<div class="row">
		<div class="container content-top-extention">		
			<div class="col-lg-8 col-md-10 mx-auto">
				<div class="leveling">

					<h1>Comments: </h1>

					<?php showComments($treeComments, 30); ?>

					<br>

					@if( Auth::check() )
					<h2>Your Comment:</h2>
					<form class="form-comment">
						<hr>
						<div class="control-group">
							<div class="form-group floating-label-form-group controls">
								<textarea id="main-comment" rows="5" class="form-control" placeholder="Comment"></textarea>
							</div>
						</div>
						<button id-parent-comment="0" class="btn btn-primary add-btn-comment">Submit</button>
					</form>
					@endif

				</div>
			</div>
		</div>
	</div>
</div>


<?php function showComments(array $treeComments, int $marginLeft) { ?>	

	<?php foreach($treeComments as $comment) : ?>
		<div class="comment">
			<div class="row">			  		
				<div class="col-md-12">
					<span>
						<b><?php echo $comment['user']['name'] ?> </b>

						<?php if( Auth::check() ) : ?>
							<a href="" class="action-comments-link reply" id-comment-form-show="<?php echo $comment['id'] ?>">reply</a> 
							
							<?php if (Auth::user()->id === $comment['user_id'] ) : ?>
							<a href="" class="action-comments-link delete-comment" id-delete-comment="<?php echo $comment['id'] ?>">delete</a> 
							<?php endif; ?>
						<?php endif; ?>

					</span>
					<br>
					<p class="text-comment"><?php echo $comment['comment'] ?></p>
				</div>
			</div>
			<hr>
			<form class="sub-comment-form" style="margin-left: 20px;" id="show-form-<?= $comment['id'] ?>">
				<div class="control-group">
					<div class="form-group floating-label-form-group controls">
						<textarea rows="5" id="subcomment-by-<?php echo $comment['id'] ?>" class="form-control" placeholder="Comment"></textarea>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<button id-parent-comment="<?php echo $comment['id'] ?>" class="btn btn-primary add-btn-comment">Submit</button>
					</div>
				</div>
			</form>
		</div>
		<?php if ( isset($comment['children']) ) : ?>
			<div style="margin-left: <?php echo $marginLeft ?>px;">
				<?php showComments($comment['children'], $marginLeft) ?>
			</div>
		<?php endif; ?>
	<?php endforeach; ?>

<?php } ?>