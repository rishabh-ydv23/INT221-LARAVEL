<!DOCTYPE html>
<html>
<head>
    <title>Localization</title>
</head>
<body>

<h2>{{ __('message.welcome') }}</h2>

<select onchange="window.location=this.value">
    <option>Select Language</option>

    <option value="/change-language/en">
        English
    </option>

    <!-- <option value="/change-language/es">
        Spanish
    </option> -->

    <option value="/change-language/fr">
        French
    </option>
</select>

</body>
</html>