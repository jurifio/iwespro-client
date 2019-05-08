<body <?php echo $data->bodyAttrs; ?>>
{{ Pixels.bodypart.default }}
<div <?php echo $data->containerAttrs; ?>>
    {{ Header.home.default }}
    {{ Content.home.default }}
    {{ Footer.home.default }}
</div>
{{ Overlay.home.default }}
</body>