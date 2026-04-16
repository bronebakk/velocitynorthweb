add_action("wp_head", function () {
    if ( ! is_page( "contact" ) ) return;
    echo '<style>
    .hs-form-frame { font-family: "JetBrains Mono", "Courier New", monospace !important; }
    .hs-form-frame h1, .hs-form-frame h2, .hs-form-frame h3 {
        background: linear-gradient(135deg,#f0ada2 0%,#db4434 50%,#f0ada2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        font-size: 1.5rem !important;
        font-weight: 700 !important;
        margin-bottom: 0.75rem !important;
    }
    .hs-form-frame p,
    .hs-form-frame .hs-richtext,
    .hs-form-frame .hs-richtext p {
        color: #ba8077 !important;
        font-size: 0.875rem !important;
    }
    .hs-form-frame label {
        color: #ba8077 !important;
        font-size: 0.75rem !important;
        letter-spacing: 0.05em !important;
        text-transform: uppercase !important;
    }
    .hs-form-frame input[type=text],
    .hs-form-frame input[type=email],
    .hs-form-frame input[type=tel],
    .hs-form-frame input[type=number],
    .hs-form-frame textarea,
    .hs-form-frame select {
        background: #0d0d0d !important;
        color: #f0ada2 !important;
        border: 1px solid rgba(219,68,52,0.3) !important;
        border-radius: 0 !important;
        padding: 0.625rem 0.75rem !important;
        width: 100% !important;
        font-family: inherit !important;
        font-size: 0.875rem !important;
        box-shadow: none !important;
    }
    .hs-form-frame input[type=text]:focus,
    .hs-form-frame input[type=email]:focus,
    .hs-form-frame input[type=tel]:focus,
    .hs-form-frame textarea:focus {
        border-color: #db4434 !important;
        outline: none !important;
    }
    .hs-form-frame input[type=submit],
    .hs-form-frame .hs-button {
        background: #db4434 !important;
        color: #fff !important;
        border: 2px solid #db4434 !important;
        border-radius: 0 !important;
        padding: 0.75rem 2rem !important;
        font-family: inherit !important;
        font-size: 0.875rem !important;
        letter-spacing: 0.05em !important;
        text-transform: uppercase !important;
        cursor: pointer !important;
    }
    .hs-form-frame input[type=submit]:hover,
    .hs-form-frame .hs-button:hover {
        background: transparent !important;
        color: #db4434 !important;
    }
    .hs-form-frame .hs-error-msgs,
    .hs-form-frame .hs-error-msg {
        color: #db4434 !important;
        font-size: 0.75rem !important;
    }
    .hs-form-frame .legal-consent-container,
    .hs-form-frame .legal-consent-container p {
        color: #886660 !important;
        font-size: 0.75rem !important;
    }
    .hs-form-frame .hs-form-booleancheckbox-display input {
        accent-color: #db4434 !important;
    }
    .hs-form-frame .iti__selected-dial-code,
    .hs-form-frame .iti__flag-container {
        background: #0d0d0d !important;
        color: #f0ada2 !important;
        border-color: rgba(219,68,52,0.3) !important;
    }
    .hs-form-frame .iti__country-list {
        background: #1e1e1e !important;
        color: #f0ada2 !important;
        border-color: rgba(219,68,52,0.3) !important;
    }
    </style>';
});
