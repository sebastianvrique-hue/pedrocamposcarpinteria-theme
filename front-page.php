<?php
$pc_form_sent = false;
$pc_form_error = '';
if ( isset( $_POST['pc_contact_submit'] ) ) {
    if ( ! isset( $_POST['pc_contact_nonce'] ) || ! wp_verify_nonce( $_POST['pc_contact_nonce'], 'pc_contact_form' ) ) {
        $pc_form_error = 'No se pudo verificar el formulario, intenta de nuevo.';
    } else {
        $nombre  = sanitize_text_field( wp_unslash( $_POST['nombre'] ?? '' ) );
        $email   = sanitize_email( wp_unslash( $_POST['email'] ?? '' ) );
        $mensaje = sanitize_textarea_field( wp_unslash( $_POST['mensaje'] ?? '' ) );

        if ( $nombre && is_email( $email ) && $mensaje ) {
            $to      = get_option( 'admin_email' );
            $subject = 'Nuevo mensaje de contacto - ' . get_bloginfo( 'name' );
            $body    = "Nombre: $nombre\nCorreo: $email\n\nMensaje:\n$mensaje";
            $headers = array( 'Reply-To: ' . $email );
            $pc_form_sent = wp_mail( $to, $subject, $body, $headers );
            if ( ! $pc_form_sent ) {
                $pc_form_error = 'No se pudo enviar el mensaje, intenta más tarde.';
            }
        } else {
            $pc_form_error = 'Por favor completa todos los campos correctamente.';
        }
    }
}
get_header();
?>

<section id="inicio" class="hero">
  <div class="container">
    <div>
      <p class="eyebrow">Carpintería artesanal · Región de La Araucanía</p>
      <h1>La madera, en manos de <em>un maestro</em>.</h1>
      <p class="hero-sub">Pisos, techos, ventanas, terrazas, quinchos y ampliaciones. Desde el detalle más pequeño hasta la transformación completa de tu hogar, con trabajo responsable y trato directo.</p>
      <div class="hero-cta">
        <a class="btn btn-wa" href="https://wa.me/56961043700?text=Hola%20Pedro%2C%20vi%20tu%20p%C3%A1gina%20web%20y%20quiero%20cotizar%20un%20trabajo" target="_blank" rel="noopener">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2a10 10 0 0 0-8.6 15.1L2 22l5-1.3A10 10 0 1 0 12 2Zm5.2 14.2c-.2.6-1.2 1.1-1.7 1.2-.4.1-1 .1-1.6-.1-.4-.1-.9-.3-1.5-.5-2.6-1.1-4.3-3.7-4.4-3.9-.1-.2-1.1-1.4-1.1-2.7s.7-1.9.9-2.2c.2-.2.5-.3.7-.3h.5c.2 0 .4 0 .6.4.2.5.7 1.8.8 1.9.1.1.1.3 0 .5-.1.2-.1.3-.3.5l-.4.5c-.1.1-.3.3-.1.6.2.3.8 1.3 1.7 2.1 1.2 1 2.1 1.4 2.4 1.5.3.1.5.1.6-.1.2-.2.7-.8.9-1.1.2-.3.4-.2.6-.1.3.1 1.7.8 2 .9.3.2.5.2.6.4 0 .1 0 .7-.2 1.4Z"/></svg>
          Cotiza por WhatsApp
        </a>
        <a class="btn btn-ghost" href="#servicios">Ver servicios</a>
      </div>
      <ul class="hero-notes">
        <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg> Respuesta rápida</li>
        <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg> Presupuesto sin costo</li>
        <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg> Trato directo con el maestro</li>
      </ul>
    </div>
    <div class="hero-visual">
      <div class="hero-badge">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/logo.jpg' ); ?>" alt="Pedro Campos — Carpintería y Obras Menores" width="340" height="340">
      </div>
    </div>
  </div>
</section>

<div class="trust-strip">
  <div class="container">
    <span class="trust-item">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 10c0 7-9 12-9 12S3 17 3 10a9 9 0 0 1 18 0Z"/><circle cx="12" cy="10" r="3"/></svg>
      Región de La Araucanía
    </span>
    <span class="trust-item">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
      Respuesta rápida y directa
    </span>
    <span class="trust-item">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
      Obras a tu medida
    </span>
    <span class="trust-item">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
      Trabajo responsable
    </span>
  </div>
</div>

<section id="servicios">
  <div class="container">
    <div class="section-head center">
      <p class="eyebrow">Servicios</p>
      <h2>Todo lo que tu hogar necesita, en un solo lugar</h2>
      <p class="section-lead">Trabajo responsable y detalles que marcan la diferencia, en cada tipo de proyecto.</p>
    </div>
    <div class="grid-3">
      <div class="card reveal">
        <div class="card-icon">
          <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="5" width="18" height="4.5" rx="1"/><rect x="3" y="14.5" width="18" height="4.5" rx="1"/><line x1="9" y1="5" x2="9" y2="9.5"/><line x1="15" y1="14.5" x2="15" y2="19"/></svg>
        </div>
        <h3>Pisos</h3>
        <p>Instalación y reparación de pisos de madera y flotantes, con terminaciones finas.</p>
      </div>
      <div class="card reveal">
        <div class="card-icon">
          <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 11 12 4l9 7"/><path d="M5 10v9h14v-9"/><line x1="5" y1="13" x2="19" y2="13"/></svg>
        </div>
        <h3>Techos</h3>
        <p>Construcción, reparación y mantención de techos y estructuras.</p>
      </div>
      <div class="card reveal">
        <div class="card-icon">
          <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="4" y="4" width="16" height="16" rx="1.5"/><line x1="12" y1="4" x2="12" y2="20"/><line x1="4" y1="12" x2="20" y2="12"/></svg>
        </div>
        <h3>Ventanas</h3>
        <p>Instalación, reparación y cambio de ventanas de madera.</p>
      </div>
      <div class="card reveal">
        <div class="card-icon">
          <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="3" y1="13" x2="21" y2="13"/><line x1="5" y1="13" x2="5" y2="20"/><line x1="12" y1="13" x2="12" y2="20"/><line x1="19" y1="13" x2="19" y2="20"/><line x1="5" y1="8" x2="19" y2="8"/><line x1="7" y1="8" x2="7" y2="13"/><line x1="17" y1="8" x2="17" y2="13"/></svg>
        </div>
        <h3>Terrazas</h3>
        <p>Diseño y construcción de terrazas de madera para disfrutar al aire libre.</p>
      </div>
      <div class="card reveal">
        <div class="card-icon">
          <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 9h18"/><path d="M4 9 12 3l8 6"/><line x1="6" y1="9" x2="6" y2="20"/><line x1="18" y1="9" x2="18" y2="20"/><path d="M9 20v-4a3 3 0 0 1 6 0v4"/></svg>
        </div>
        <h3>Quinchos</h3>
        <p>Quinchos a medida, pensados para compartir en familia todo el año.</p>
      </div>
      <div class="card reveal">
        <div class="card-icon">
          <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 11 12 4l9 7"/><path d="M5 10v9h6"/><line x1="17" y1="14" x2="17" y2="20"/><line x1="14" y1="17" x2="20" y2="17"/></svg>
        </div>
        <h3>Ampliaciones</h3>
        <p>Ampliaciones y remodelaciones para que tu casa crezca contigo.</p>
      </div>
    </div>
  </div>
</section>

<section id="proceso" class="process">
  <div class="container">
    <div class="section-head center">
      <p class="eyebrow">Cómo trabajamos</p>
      <h2>De la idea a la obra, sin vueltas</h2>
      <p class="section-lead">Un proceso simple y transparente, de principio a fin.</p>
    </div>
    <div class="process-grid">
      <div class="step reveal">
        <div class="step-num">01</div>
        <h3>Cuéntanos tu proyecto</h3>
        <p>Escríbenos por WhatsApp y describe lo que necesitas. Te respondemos rápido, sin formularios eternos.</p>
      </div>
      <div class="step reveal">
        <div class="step-num">02</div>
        <h3>Visita y presupuesto</h3>
        <p>Coordinamos una visita, medimos y te entregamos un presupuesto claro y sin compromiso.</p>
      </div>
      <div class="step reveal">
        <div class="step-num">03</div>
        <h3>Manos a la obra</h3>
        <p>Ejecutamos el trabajo con materiales de calidad, plazos claros y terminaciones que se notan.</p>
      </div>
    </div>
  </div>
</section>

<section id="galeria">
  <div class="container">
    <div class="section-head center">
      <p class="eyebrow">Galería</p>
      <h2>Trabajos que hablan por sí solos</h2>
      <p class="section-lead">Estamos preparando esta sección con fotos de nuestros proyectos. Mientras tanto, síguelos en nuestro Instagram.</p>
    </div>
    <div class="gallery-grid">
      <?php for ( $i = 0; $i < 6; $i++ ) : ?>
      <div class="gallery-item reveal">
        <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
        Foto próximamente
      </div>
      <?php endfor; ?>
    </div>
    <p class="gallery-cta">
      <a class="btn btn-wood" href="https://instagram.com/carpinteria_pedrocampos" target="_blank" rel="noopener">
        <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="2" width="20" height="20" rx="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
        Ver más en Instagram
      </a>
    </p>
  </div>
</section>

<section id="nosotros" class="alt-bg">
  <div class="container about-wrap">
    <div>
      <p class="eyebrow">Sobre nosotros</p>
      <h2>Oficio, compromiso y palabra</h2>
      <p>En Pedro Campos realizamos trabajos de carpintería y obras menores con atención personalizada y compromiso en cada detalle. Atendemos toda la Región de La Araucanía, construyendo espacios para disfrutar.</p>
      <p>Cada proyecto, sin importar su tamaño, se trabaja con la misma dedicación: la que se le pone a las cosas bien hechas.</p>
      <p class="about-quote">"Desde pequeños detalles hasta grandes transformaciones, cada proyecto es una historia que contar."</p>
    </div>
    <div class="why-card">
      <h3>¿Por qué elegirnos?</h3>
      <ul class="check-list">
        <li>
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
          <div>Experiencia<small>Años de oficio en la madera y las obras menores.</small></div>
        </li>
        <li>
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
          <div>Responsabilidad<small>Compromisos claros y trabajos que se entregan como se prometen.</small></div>
        </li>
        <li>
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
          <div>Puntualidad<small>Plazos que se respetan, de la visita a la entrega.</small></div>
        </li>
        <li>
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
          <div>Respuesta rápida y directa<small>Hablas directo con el maestro, sin intermediarios.</small></div>
        </li>
      </ul>
    </div>
  </div>
</section>

<section id="contacto">
  <div class="container contact-wrap">
    <div>
      <p class="eyebrow">Contacto</p>
      <h2>¿Tienes un proyecto pendiente?</h2>
      <p>Cotiza y consulta por WhatsApp: respuesta rápida y directa. También puedes dejarnos un mensaje con el formulario y te contactamos.</p>
      <ul class="contact-info">
        <li>
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 10c0 7-9 12-9 12S3 17 3 10a9 9 0 0 1 18 0Z"/><circle cx="12" cy="10" r="3"/></svg>
          Región de La Araucanía, Chile
        </li>
        <li>
          <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2a10 10 0 0 0-8.6 15.1L2 22l5-1.3A10 10 0 1 0 12 2Zm5.2 14.2c-.2.6-1.2 1.1-1.7 1.2-.4.1-1 .1-1.6-.1-.4-.1-.9-.3-1.5-.5-2.6-1.1-4.3-3.7-4.4-3.9-.1-.2-1.1-1.4-1.1-2.7s.7-1.9.9-2.2c.2-.2.5-.3.7-.3h.5c.2 0 .4 0 .6.4.2.5.7 1.8.8 1.9.1.1.1.3 0 .5-.1.2-.1.3-.3.5l-.4.5c-.1.1-.3.3-.1.6.2.3.8 1.3 1.7 2.1 1.2 1 2.1 1.4 2.4 1.5.3.1.5.1.6-.1.2-.2.7-.8.9-1.1.2-.3.4-.2.6-.1.3.1 1.7.8 2 .9.3.2.5.2.6.4 0 .1 0 .7-.2 1.4Z"/></svg>
          <a href="https://wa.me/56961043700?text=Hola%20Pedro%2C%20vi%20tu%20p%C3%A1gina%20web%20y%20quiero%20cotizar%20un%20trabajo" target="_blank" rel="noopener">+56 9 6104 3700</a>
        </li>
        <li>
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="2" width="20" height="20" rx="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
          <a href="https://instagram.com/carpinteria_pedrocampos" target="_blank" rel="noopener">@carpinteria_pedrocampos</a>
        </li>
      </ul>
    </div>
    <div class="contact-card">
      <h3>Escríbenos</h3>
      <p>Cuéntanos qué necesitas y te respondemos a la brevedad.</p>
      <?php if ( $pc_form_sent ) : ?>
        <p class="form-ok">¡Gracias! Tu mensaje fue enviado correctamente.</p>
      <?php else : ?>
        <?php if ( $pc_form_error ) : ?>
          <p class="form-error"><?php echo esc_html( $pc_form_error ); ?></p>
        <?php endif; ?>
        <form class="contact-form" method="post" action="#contacto">
          <?php wp_nonce_field( 'pc_contact_form', 'pc_contact_nonce' ); ?>
          <input type="text" name="nombre" placeholder="Tu nombre" value="<?php echo esc_attr( $_POST['nombre'] ?? '' ); ?>" required>
          <input type="email" name="email" placeholder="Tu correo" value="<?php echo esc_attr( $_POST['email'] ?? '' ); ?>" required>
          <textarea name="mensaje" rows="5" placeholder="Cuéntanos sobre tu proyecto" required><?php echo esc_textarea( $_POST['mensaje'] ?? '' ); ?></textarea>
          <button type="submit" name="pc_contact_submit" value="1">Enviar mensaje</button>
        </form>
      <?php endif; ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>
