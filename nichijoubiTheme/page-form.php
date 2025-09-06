<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
jQuery(document).ready(function($) {
	// テキストエリアの文字数カウント
	function setupCharCounter(textareaId) {
		const textarea = document.getElementById(textareaId);
		const counter = document.getElementById(textareaId + '-count');

		if (textarea && counter) {
			function updateCounter() {
				const currentLength = textarea.value.length;
				counter.textContent = currentLength;
			}

			textarea.addEventListener('input', updateCounter);
			// ページロード時にも初期値を表示
			updateCounter();
		}
	}

	setupCharCounter('concept');
	setupCharCounter('profile');
	setupCharCounter('Philosophy');
	setupCharCounter('message');

	// ファイルアップロードの処理
	function setupFileInput(inputId) {
		const input = document.getElementById(inputId);
		const fileNamesDiv = document.getElementById(inputId + '-names');

		if (input && fileNamesDiv) {
			input.addEventListener('change', function() {
				fileNamesDiv.innerHTML = ''; // Clear previous file names

				if (this.files.length > 0) {
					for (let i = 0; i < this.files.length; i++) {
						const file = this.files[i];
						const p = document.createElement('p');
						p.textContent = file.name + ' (' + (file.size / 1024 / 1024).toFixed(2) + ' MB)';
						fileNamesDiv.appendChild(p);
					}
				}
			});
		}
	}

	setupFileInput('profileImage');
	setupFileInput('studioImage');
	setupFileInput('productImage');
	setupFileInput('imagecut');

	// フォーム送信時の追加バリデーション
	$('#shimasaku-form').on('submit', function(e) {

		// 各必須テキストエリアの文字数チェック
		const requiredTextareas = ['concept', 'profile', 'Philosophy', 'message'];
		for (let i = 0; i < requiredTextareas.length; i++) {
			const textarea = document.getElementById(requiredTextareas[i]);
			if (textarea && textarea.value.length === 0) {
				alert('必須項目が入力されていません。');
				e.preventDefault(); // フォーム送信を阻止
				return false;
			}
		}

		// ファイルアップロードの必須チェック (新規ファイルが選択されているか、または編集モードで既存ファイルがあるか)
		const fileInputs = ['profileImage', 'studioImage', 'productImage', 'imagecut'];
		for (let i = 0; i < fileInputs.length; i++) {
			const input = document.getElementById(fileInputs[i]);
			// 既存ファイル表示要素のチェック (既存ファイル表示がないため、このロジックは常にfalseになるが残しておく)
			// inputの次の兄弟要素（div.file-names）の次の兄弟要素がcurrent-files divの場合
			let hasCurrentFiles = false;
			if (input && input.nextElementSibling && input.nextElementSibling.nextElementSibling) {
				const currentFilesDiv = input.nextElementSibling.nextElementSibling;
				if (currentFilesDiv.classList.contains('current-files')) { // current-files クラスを持つ div であるか確認
					hasCurrentFiles = currentFilesDiv.querySelector('a'); // 既存ファイルがあるかチェック
				}
			}

			if (input && input.required && input.files.length === 0 && !hasCurrentFiles) {
				alert('必須のファイルが選択されていません。');
				e.preventDefault();
				return false;
			}
		}
	});
});
</script>
<?php
/*
Template Name: Form Page
*/
// 再編集用のデータを取得 (edit_id ではなく edit_token を使用)
$edit_data = [];
$is_editing = false; // 編集モードかどうかを判定するフラグ
if (isset($_GET['edit_token']) && !empty($_GET['edit_token'])) {
	global $wpdb;
	$table_name = $wpdb->prefix . 'shimasakuFormData';
	$edit_token = sanitize_text_field($_GET['edit_token']); // トークンもサニタイズ
	
	// トークンを使ってデータを取得
	$edit_data = $wpdb->get_row($wpdb->prepare("SELECT * FROM %i WHERE edit_token = %s", $table_name, $edit_token), ARRAY_A);

	// 編集データが存在する場合のみ、hiddenフィールドにIDとトークンを設定
	if (!empty($edit_data) && isset($edit_data['id'])) {
		$is_editing = true; // 編集モードをONにする
		// IDは内部処理用、トークンも念のため引き回す（フォーム送信時に再利用するため）
		echo '<input type="hidden" name="edit_id" value="' . esc_attr($edit_data['id']) . '">';
		echo '<input type="hidden" name="edit_token" value="' . esc_attr($edit_data['edit_token']) . '">';
	} else {
		// 無効なトークンの場合、リダイレクトまたはエラーメッセージ表示
		wp_redirect(get_permalink(get_page_by_path('form'))); // 無効なトークンならフォームトップへ戻す
		exit;
	}
}
?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/form.css?<?php echo file_date(get_template_directory() . '/css/form.css'); ?>" type="text/css" />


<div id="primary" class="content-area">

	<main id="main" class="site-main">

		<h1>島作 出展者向けアンケートフォーム(ver1.1)</h1>
		
		<?php if (!(isset($_GET['status']) && $_GET['status'] == 'success')) : ?>
		<p class="required-notice">*は必須項目です</p>
		<?php if ($is_editing) : ?>
			<p class="file-upload-notice" style="color: red; font-weight: bold; margin-bottom: 20px;">
				アンケート再回答時は、以前の回答時にアップロードいただいたファイルの復元はされませんのでお手数ですがあらためてファイルのアップロードをお願いいたします。
			</p>
		<?php endif; ?>
		<?php endif; ?>

		<?php if (isset($_GET['status']) && $_GET['status'] == 'success') : ?>
			<div class="form-success-message">
				<p>フォームの送信が完了しました。ご回答ありがとうございます。</p>
				<p>入力いただいたメールアドレスに確認メールを送信しましたのでご確認ください。</p>
				<p>もし再編集が必要な場合は、メールに記載されたURLからアクセスしてください。</p>
			</div>
		<?php else : ?>
			<form id="shimasaku-form" action="" method="post" enctype="multipart/form-data">

				<?php wp_nonce_field('shimasaku_form_nonce', 'shimasaku_form_nonce_field'); ?>
				<?php if (!empty($edit_data) && isset($edit_data['id'])) : ?>
					<input class="text" type="hidden" name="edit_id" value="<?php echo esc_attr($edit_data['id']); ?>">
				<?php endif; ?>

				<div class="form-group">
					<div class="formLabel" for="p_name">名前 <span class="required">*</span></div>
					<input class="text" type="text" id="p_name" name="p_name" value="<?php echo esc_attr($edit_data['p_name'] ?? ''); ?>">
				</div>

				<div class="form-group">
					<div class="formLabel"  for="brandname">ブランド名（任意）</div>
					<input class="text"  type="text" id="brandname" name="brandname" value="<?php echo esc_attr($edit_data['brandname'] ?? ''); ?>">
				</div>

				<div class="form-group">
					<div class="formLabel"  for="p_emailaddress">メールアドレス <span class="required">*</span></div>
					<input class="text"  type="email" id="p_emailaddress" name="p_emailaddress" value="<?php echo esc_attr($edit_data['p_emailaddress'] ?? ''); ?>">
				</div>

				<div class="form-group">
					<div class="formLabel"  for="home_URL">ホームページURL（任意）</div>
					<input class="text"  type="text" id="home_URL" name="home_URL" value="<?php echo esc_attr($edit_data['home_URL'] ?? ''); ?>">
				</div>

				<div class="form-group">
					<div class="formLabel"  for="instagram_URL">Instagram アカウント名（任意）</div>
					<input class="text"  type="text" id="instagram_URL" name="instagram_URL" placeholder="@xxxxxの形式で入力ください"value="<?php echo esc_attr($edit_data['instagram_URL'] ?? ''); ?>">
				</div>

				<div class="form-group">
					<div class="formLabel"  for="concept">コンセプト <span class="required">*</span></div>
					<textarea id="concept" name="concept" rows="5" maxlength="200"><?php echo esc_textarea($edit_data['concept'] ?? ''); ?></textarea>
					<div class="char-count">現在の文字数: <span id="concept-count">0</span>/200</div>
				</div>

				<div class="form-group">
					<div class="formLabel"  for="profile">プロフィール <span class="required">*</span></div>
					<textarea id="profile" name="profile" rows="5" maxlength="200"><?php echo esc_textarea($edit_data['profile'] ?? ''); ?></textarea>
					<div class="char-count">現在の文字数: <span id="profile-count">0</span>/200</div>
				</div>

				<div class="form-group">
					<div class="formLabel"  for="Philosophy">ものづくりに対する想いやこだわり（200文字以内） <span class="required">*</span></div>
					<textarea id="Philosophy" name="Philosophy" rows="5" maxlength="200"><?php echo esc_textarea($edit_data['Philosophy'] ?? ''); ?></textarea>
					<div class="char-count">現在の文字数: <span id="Philosophy-count">0</span>/200</div>
				</div>

				<div class="form-group">
					<div class="formLabel"  for="message">作品を手に取ってくださる方に伝えたいこと（200文字以内） <span class="required">*</span></div>
					<textarea id="message" name="message" rows="5" maxlength="200"><?php echo esc_textarea($edit_data['message'] ?? ''); ?></textarea>
					<div class="char-count">現在の文字数: <span id="message-count">0</span>/200</div>
				</div>

				<div class="form-group">
					<div class="formLabel"  for="profileImage">プロフィール写真（最大5枚まで可）<span class="required">*</span></div>
					<input type="file" class="fileButton" id="profileImage" name="profileImage[]" multiple accept="image/*">
					<div class="attention" style="color:#888888"> 写真は1MB以上のものをアップロードお願いします。 </div>

					<div class="file-names" id="profileImage-names"></div>
					<?php if (!empty($edit_data['profileImage'])) : ?>
					<?php endif; ?>
				</div>

				<div class="form-group">
					<div class="formLabel"  for="studioImage">製作写真、工房の写真（最大5枚まで可） <span class="required">*</span></div>
					<input type="file" class="fileButton"  id="studioImage" name="studioImage[]" multiple accept="image/*">
					<div class="attention" style="color:#888888"> 写真は1MB以上のものをアップロードお願いします。 </div>
					<div class="file-names" id="studioImage-names"></div>
					<?php if (!empty($edit_data['studioImage'])) : ?>
					<?php endif; ?>
				</div>

				<div class="form-group">
					<div class="formLabel"  for="productImage">作品写真（最大5枚まで可） <span class="required">*</span></div>
					<input type="file" class="fileButton"  id="productImage" name="productImage[]" multiple accept="image/*">
					<div class="attention" style="color:#888888"> 写真は1MB以上のものをアップロードお願いします。 </div>
					<div class="file-names" id="productImage-names"></div>
					<?php if (!empty($edit_data['productImage'])) : ?>
					<?php endif; ?>
				</div>

				<div class="form-group">
					<div class="formLabel"  for="imagecut">イメージカット（最大5枚まで可） <span class="required">*</span></div>
					<input type="file" class="fileButton"  id="imagecut" name="imagecut[]" multiple accept="image/*">
					<div class="attention" style="color:#888888"> 写真は1MB以上のものをアップロードお願いします。 </div>
					<div class="file-names" id="imagecut-names"></div>
					<?php if (!empty($edit_data['imagecut'])) : ?>
					<?php endif; ?>
				</div>

				<button type="submit" name="submit_form">回答する</button>

			</form>
		<?php endif; ?>

	</main></div><?php
?>