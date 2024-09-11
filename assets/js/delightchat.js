const _waEmbed = (widgetConfig, chatConfig) => {
    const createWidgetButton = () => {
        const widgetButton = document.createElement("div");
        widgetButton.setAttribute("id", "wa-btn-wrapper");
        const config = widgetConfig;
        const existingWidgetButton = document.getElementById("wa-btn-wrapper");

        widgetButton.style.position = "fixed";
        widgetButton.style.zIndex = config.zIndex;
        widgetButton.style.bottom = `${config.marginBottom}px`;
        widgetButton.style.left = config.btnPosition === "left" ? `${config.marginLeft}px` : "";
        widgetButton.style.right = config.btnPosition === "right" ? `${config.marginRight}px` : "";

        widgetButton.innerHTML = `
            <div id="wa_btn-content" style="background: ${config.btnColor || "#25D366"}; padding: ${config.ctaText === "" ? "" : "12px"}; border-radius: ${config.ctaText === "" ? "100%" : `${config.cornerRadius}px`}">
          <!-- Your SVG code here -->

      <svg id="wa-widget-svg" xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 24 24" fill="#fff" style="pointer-events: none; display: block;"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86s.274.072.376-.043c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.1.824zm-3.423-14.416c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm.029 18.88c-1.161 0-2.305-.292-3.318-.844l-3.677.964.984-3.595c-.607-1.052-.927-2.246-.926-3.468.001-3.825 3.113-6.937 6.937-6.937 1.856.001 3.598.723 4.907 2.034 1.31 1.311 2.031 3.054 2.03 4.908-.001 3.825-3.113 6.938-6.937 6.938z"/></svg>
        </div>
        `;

        widgetButton.addEventListener("click", () => {
            if (chatConfig) {
                const waWidgetContent = document.getElementById("wa_widget-content");
                if (waWidgetContent) {
                    waWidgetContent.style.display = waWidgetContent.style.display === "block" ? "none" : "block";
                } else {
                    let widgetWrapper = document.createElement("div");
                    widgetWrapper.setAttribute("id", "wa-widget-wrapper");
                    widgetWrapper = createWidgetContent(widgetWrapper, widgetConfig);

                    document.body.appendChild(widgetWrapper);

                    document.getElementById("wa-widget-button").addEventListener("click", (e) =>
                        window.open(`https://wa.me/${config.whatsAppNumber}?text=${encodeURIComponent(config.welcomeMessage || "")}`, "_blank")
                    );

                    document.getElementById("wa-widget-close-btn").addEventListener("click", (e) => {
                        document.getElementById("wa_widget-content").style.display = "none";
                    });
                }
            } else {
                window.open(`https://wa.me/${widgetConfig.whatsAppNumber}?text=${encodeURIComponent(widgetConfig.welcomeMessage || "")}`, "_blank");
            }
        });

        if (!existingWidgetButton) {
            document.body.appendChild(widgetButton);
        }
        // Trigger a click event on widgetButton after 5 seconds
        setTimeout(() => {
            widgetButton.click();
            // Add the following lines to set wa_widget-content to display:block
            const waWidgetContent = document.getElementById("wa_widget-content");
            if (waWidgetContent) {
                waWidgetContent.style.display = "block";
            }
        }, 5000); // 5000 milliseconds (5 seconds)
    };

    const createWidgetContent = (widgetElement, config) => {
        widgetElement.style.position = "fixed";
        widgetElement.style.zIndex = config.zIndex;
        widgetElement.style.bottom = `${config.marginBottom + 80}px`;
        widgetElement.style.left = config.btnPosition === "left" ? `${config.marginLeft}px` : "";
        widgetElement.style.right = config.btnPosition === "right" ? `${config.marginRight}px` : "";

        widgetElement.innerHTML = `
            <div id="wa_widget-content">
          <div class="wa_widget-brand-container" style="background: ${chatConfig.headerBackgroundColor}">
            <div><img class="wa_widget-brand-image" src="${chatConfig.brandImage || ""}"></div>
            <div class="wa_widget-brand-info">
              <h4 style="color: ${chatConfig.headerColorScheme === "dark" ? chatConfig.darkHeaderColorScheme.title : "white"}">${chatConfig.title || ""}</h4>
              <p style="color: ${chatConfig.headerColorScheme === "dark" ? chatConfig.darkHeaderColorScheme.subTitle : "white"}">${chatConfig.subTitle || ""}</p>
            </div>
            <div class="wa_widget-close-btn" id="wa-widget-close-btn">
              <svg height="12" width="12" viewPort="0 0 12 12" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <line x1="1" y1="11" x2="11" y2="1" stroke="${chatConfig.headerColorScheme === "dark" ? "black" : "white"}" stroke-width="2"/>
                <line x1="1" y1="1" x2="11" y2="11" stroke="${chatConfig.headerColorScheme === "dark" ? "black" : "white"}" stroke-width="2"/>
              </svg>
            </div>
          </div>
          <div class="wa_widget-message-container">
            <div class="wa_widget-message">
              <h4>${chatConfig.title || ""}</h4>
              <p>${chatConfig.greetingText || ""}</p>
            </div>
          </div>
          <div class="wa_widget-button-container">
            <div class="wa_widget-button btn btn-secondary" id="wa-widget-button" style="background: ${chatConfig.btnColor};">
              <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M18.1225 14.9458C17.8183 14.7895 16.3033 14.0473 16.0215 13.9469C15.7397 13.8409 15.5332 13.7907 15.3295 14.1032C15.123 14.4129 14.5371 15.102 14.3529 15.3113C14.1744 15.5178 13.993 15.5429 13.6889 15.3894C11.8808 14.4854 10.695 13.7767 9.50361 11.7315C9.18832 11.1874 9.8189 11.2265 10.4076 10.0518C10.5081 9.84534 10.4578 9.66956 10.3797 9.51331C10.3016 9.35706 9.68776 7.84478 9.43106 7.22815C9.18274 6.62826 8.92604 6.71197 8.7391 6.70081C8.56053 6.68965 8.35684 6.68965 8.15037 6.68965C7.9439 6.68965 7.61187 6.76777 7.33006 7.0719C7.04825 7.38161 6.25305 8.12659 6.25305 9.63887C6.25305 11.1511 7.35517 12.616 7.50584 12.8225C7.66209 13.0289 9.67381 16.1316 12.7625 17.4681C14.7157 18.3107 15.4802 18.3833 16.4567 18.2382C17.051 18.1489 18.2759 17.496 18.5298 16.7734C18.7837 16.0535 18.7837 15.4369 18.7084 15.3085C18.6331 15.1718 18.4266 15.0937 18.1225 14.9458Z" fill="${"dark"==chatConfig.btnColorScheme?chatConfig.darkHeaderColorScheme.title:"white"}"/>
            <path d="M24.0292 7.65625C23.3986 6.15792 22.4946 4.81306 21.3422 3.65792C20.198 2.50948 18.8395 1.5966 17.3439 0.970982C15.8093 0.326451 14.1798 0 12.5002 0H12.4444C10.7535 0.00837054 9.11567 0.343192 7.57549 1.00167C6.09267 1.63371 4.74699 2.54821 3.61344 3.6942C2.47226 4.84654 1.57661 6.18583 0.95719 7.67857C0.315449 9.22433 -0.00821224 10.8677 0.000158294 12.5586C0.00962607 14.4963 0.468048 16.4054 1.33944 18.1362V22.3772C1.33944 22.7176 1.47467 23.0441 1.71537 23.2848C1.95607 23.5255 2.28253 23.6607 2.62293 23.6607H6.86679C8.59752 24.5321 10.5067 24.9905 12.4444 25H12.5029C14.1743 25 15.7954 24.6763 17.3216 24.043C18.8097 23.4248 20.163 22.5226 21.306 21.3867C22.4583 20.2455 23.3651 18.9118 23.9985 17.4247C24.657 15.8845 24.9918 14.2467 25.0002 12.5558C25.0085 10.8566 24.6793 9.20759 24.0292 7.65625ZM19.8132 19.8772C17.8573 21.8136 15.2624 22.8795 12.5002 22.8795H12.4527C10.7702 22.8711 9.09893 22.4526 7.62293 21.6657L7.38855 21.5402H3.45998V17.6116L3.33442 17.3772C2.54759 15.9012 2.12906 14.2299 2.12069 12.5474C2.10953 9.76562 3.17259 7.15402 5.12293 5.18694C7.07047 3.21987 9.67371 2.1317 12.4555 2.12054H12.5029C13.898 2.12054 15.2513 2.39118 16.5264 2.9269C17.7708 3.44866 18.8869 4.19922 19.8467 5.15904C20.8037 6.11607 21.5571 7.23493 22.0788 8.47935C22.6201 9.76841 22.8908 11.1356 22.8852 12.5474C22.8685 15.3265 21.7775 17.9297 19.8132 19.8772Z" fill="${"dark"==chatConfig.btnColorScheme?o.darkHeaderColorScheme.title:"white"}"/>
            </svg>
              <p style="color: ${chatConfig.btnColorScheme === "dark" ? chatConfig.darkHeaderColorScheme.title : "white"}; margin-left: ${chatConfig.ctaText === "" ? "0px !important" : ""}">${chatConfig.ctaText || ""}</p>
            </div>
          </div>
        </div>
        `;

        return widgetElement;
    };

    const loadStyles = () => {
        const linkElement = document.createElement("link");
        linkElement.setAttribute("rel", "stylesheet");
        linkElement.setAttribute("type", "text/css");
        linkElement.onload = createWidgetButton;
        linkElement.setAttribute("href", `${themeSettings.themeUrl}/assets/css/delightchat.css`); // Use themeSettings to get theme URL
        document.head.appendChild(linkElement);
    };

    loadStyles();
};

