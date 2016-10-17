<?php
	$id = 113024;

	$adServer = new AdServer\AdClient();

	$listing = $adServer->get_status( array(
		'site' => $_SERVER['SERVER_NAME'],
		'dss_id' => $id,
		'url' => $_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI],
		'ad_category' => 'library'
	))[0];
?>

<div class="snippet-cr-ad" data-plugin="cr-tracking">
	<?php if( isset($data->header) ) : ?>
		<h3> 
			<?=$data->header ;?>
		</h3>
	<?php endif; ?>

	<?php if( isset($data->message) ) :?>
		<p>
			<?=$data->message;?>
		</p>
	<?php endif;?>

	<div class="block">
		<div class="row">
			<div class="col-sm-5 col-md-6">
				<a href="<?=$url;?>" class="image">
					<img src="<?=$listing->images[0][0];?>" />
				</a>
			</div>

			<div class="col-sm-7 col-md-6">
				<div class="content sponsored" itemscope itemtype="http://schema.org/LocalBusiness">
					<a href="<?=$listing->slugs->recovery_org;?>" class="title" itemprop="name" data-id="<?=$listing->dss_id;?>" data-name="<?=$listing->name;?>" data-ctn="<?=$listing->ctn;?>">
						<?=$listing->name;?>
					</a>
					<?php if( !empty( $listing->ctn )) : ?>
					<a href="<?=get_tel_link( $listing->ctn );?>" class="phone" itemprop="telephone" data-id="<?=$listing->dss_id;?>" data-name="<?=$listing->name;?>" data-ctn="<?=$listing->ctn;?>">

						<span aria-hidden="true" data-entypo-icon="&#128222;"></span> 
						
						<?=get_clean_phone( $listing->ctn );?>
					</a>
					<?php endif; ?>

					<div class="address" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
						<div class="street-address" itemprop="streetAddress">
							<?=( strlen($listing->address->address) > 25 ? substr($listing->address->address, 0, 25) . '...' : $listing->address->address );?>
						</div>
						<span class="locality" itemprop="addressLocality">
							<?=$listing->address->city;?>
						</span>,
						<abbr class="region" itemprop="addressRegion">
							<?=$dss->getRegionAbbr($listing->address->region);?>
						</abbr>
						<span class="postal-code" itemprop="postalCode">
							<?=$listing->address->zip_code;?>
						</span>
					</div>

					<a class="btn-flat btn-gray" href="<?=$listing->slugs->recovery_org;?>" data-id="<?=$listing->dss_id;?>" data-name="<?=$listing->name;?>" data-ctn="<?=$listing->ctn;?>">
						Learn More
					</a>
				</div>
			</div>
		</div>
	</div>
</div>

