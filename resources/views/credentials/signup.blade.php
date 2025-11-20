<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Crypto Guard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="{{ asset('css/style_signup.css') }}">
    <link rel="icon" href="{{ asset('resources/bicho.png') }}">
</head>
<body>
    <div class="auth-container">
        <div class="auth-header">
            <div class="auth-logo">
                <i class="fas fa-shield-alt auth-logo-icon"></i>
                <span class="auth-logo-text">Crypto Guard</span>
            </div>
            <h1 class="auth-title">Crear Cuenta</h1>
            <p class="auth-subtitle">Únete a nuestra comunidad de seguridad</p>
        </div>

        <!-- Progress Indicator (inicia en paso 1) -->
        <div class="form-progress">
            <div class="progress-step active">1</div>
            <div class="progress-step">2</div>
            <div class="progress-step">3</div>
        </div>

        <form class="auth-form" id="signup-form" action="{{ route('signup') }}" method="POST">
            @csrf
            @if ($errors->any())
    <div class="error-box">
        <strong>⚠️ Ocurrieron algunos errores:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>• {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


            <!-- Sección 1: Información Personal -->
            <div class="form-section active" id="section-1">
                <div class="form-group">
                    <label for="name">Nombre *</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Tu nombre" required value="{{ old('name') }}">
                    <div class="error-message" id="name-error">El nombre es obligatorio y debe tener al menos 2 caracteres</div>
                </div>

                <div class="form-group">
                    <label for="paterno">Apellido Paterno *</label>
                    <input type="text" id="paterno" name="paterno" class="form-control" placeholder="Apellido paterno" required value="{{ old('paterno') }}">
                    <div class="error-message" id="paterno-error">El apellido paterno es obligatorio</div>
                </div>

                <div class="form-group">
                    <label for="materno">Apellido Materno *</label>
                    <input type="text" id="materno" name="materno" class="form-control" placeholder="Apellido materno" required value="{{ old('materno') }}">
                    <div class="error-message" id="materno-error">El apellido materno es obligatorio</div>
                </div>

                <div class="form-group">
                    <label for="birthdate">Fecha de Nacimiento *</label>
                    <input type="text" id="birthdate" name="birthdate" class="form-control flatpickr-input" placeholder="Selecciona tu fecha de nacimiento" readonly value="{{ old('birthdate') }}">
                    <div class="error-message" id="birthdate-error">Debes ingresar una fecha válida</div>
                </div>

                <div class="form-group">
                    <label>Sexo *</label>
                    <div class="radio-group">
                        <label class="radio-option">
                            <input type="radio" id="sex-male" name="sex" value="male" required {{ old('sex') == 'male' ? 'checked' : '' }}>
                            <span>Masculino</span>
                        </label>
                        <label class="radio-option">
                            <input type="radio" id="sex-female" name="sex" value="female" {{ old('sex') == 'female' ? 'checked' : '' }}>
                            <span>Femenino</span>
                        </label>
                        <label class="radio-option">
                            <input type="radio" id="sex-other" name="sex" value="other" {{ old('sex') == 'other' ? 'checked' : '' }}>
                            <span>Otro</span>
                        </label>
                    </div>
                    <div class="error-message" id="sex-error">Debes seleccionar una opción</div>
                </div>

                <div class="form-navigation">
                    <button type="button" class="btn btn-primary" id="next-1" disabled>Siguiente</button>
                </div>
            </div>

            <!-- Sección 2: Información de Cuenta -->
            <div class="form-section" id="section-2">
                <div class="form-group">
                    <label for="email">Correo Electrónico *</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="tu.correo@ejemplo.com" required value="{{ old('email') }}">
                    <div class="error-message" id="email-error">Ingresa un correo electrónico válido</div>
                </div>

                <div class="form-group">
                    <label for="username">Nombre de Usuario *</label>
                    <input type="text" id="username" name="username" class="form-control" placeholder="Elige un nombre de usuario" required value="{{ old('username') }}">
                    <div class="error-message" id="username-error">El nombre de usuario debe tener entre 3 y 20 caracteres (solo letras, números y _)</div>
                </div>

                <div class="form-group">
                    <label for="password">Contraseña *</label>
                    <div class="password-container">
                        <input type="password" id="password" name="password" class="form-control" placeholder="Crea una contraseña segura" required>
                        <button type="button" class="toggle-password" data-target="password">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    <div class="password-strength" id="password-strength">
                        <div class="password-strength-bar"></div>
                    </div>
                    <div class="password-requirements">
                        <div class="requirement unmet" id="length-req">
                            <i class="fas fa-times"></i> Mínimo 8 caracteres
                        </div>
                        <div class="requirement unmet" id="uppercase-req">
                            <i class="fas fa-times"></i> Al menos una mayúscula
                        </div>
                        <div class="requirement unmet" id="lowercase-req">
                            <i class="fas fa-times"></i> Al menos una minúscula
                        </div>
                        <div class="requirement unmet" id="number-req">
                            <i class="fas fa-times"></i> Al menos un número
                        </div>
                        <div class="requirement unmet" id="special-req">
                            <i class="fas fa-times"></i> Al menos un carácter especial
                        </div>
                    </div>
                    <div class="error-message" id="password-error">La contraseña no cumple con los requisitos de seguridad</div>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirmar Contraseña *</label>
                    <div class="password-container">
                        <!-- Mantengo name="password_confirmation" para Laravel, pero id="confirm-password" para JS -->
                        <input type="password" id="confirm-password" name="password_confirmation" class="form-control" placeholder="Repite tu contraseña" required>
                        <button type="button" class="toggle-password" data-target="confirm-password">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    <div class="error-message" id="confirm-password-error">Las contraseñas no coinciden</div>
                </div>

                <div class="form-navigation">
                    <button type="button" class="btn btn-secondary" id="prev-2">Anterior</button>
                    <button type="button" class="btn btn-primary" id="next-2" disabled>Siguiente</button>
                </div>
            </div>

            <!-- Sección 3: Información Profesional -->
            <div class="form-section" id="section-3">
                <div class="form-group">
                    <label for="company">Empresa</label>
                    <input type="text" id="company" name="company" class="form-control" placeholder="Nombre de tu empresa (opcional)" value="{{ old('company') }}">
                </div>

                <div class="form-group">
                    <label for="role">Rol en Ciberseguridad</label>
                    <select id="role" name="role" class="select-control">
                        <option value="">Selecciona tu rol</option>
                        <option value="analyst" {{ old('role') == 'analyst' ? 'selected' : '' }}>Analista de Seguridad</option>
                        <option value="engineer" {{ old('role') == 'engineer' ? 'selected' : '' }}>Ingeniero de Seguridad</option>
                        <option value="consultant" {{ old('role') == 'consultant' ? 'selected' : '' }}>Consultor</option>
                        <option value="researcher" {{ old('role') == 'researcher' ? 'selected' : '' }}>Investigador</option>
                        <option value="student" {{ old('role') == 'student' ? 'selected' : '' }}>Estudiante</option>
                        <option value="enthusiast" {{ old('role') == 'enthusiast' ? 'selected' : '' }}>Entusiasta</option>
                        <option value="other" {{ old('role') == 'other' ? 'selected' : '' }}>Otro</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="experience">Años de Experiencia</label>
                    <select id="experience" name="experience" class="select-control">
                        <option value="">Selecciona años de experiencia</option>
                        <option value="0-2" {{ old('experience') == '0-2' ? 'selected' : '' }}>0-2 años</option>
                        <option value="3-5" {{ old('experience') == '3-5' ? 'selected' : '' }}>3-5 años</option>
                        <option value="6-10" {{ old('experience') == '6-10' ? 'selected' : '' }}>6-10 años</option>
                        <option value="10+" {{ old('experience') == '10+' ? 'selected' : '' }}>Más de 10 años</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="specialty">Especialidad Principal</label>
                    <select id="specialty" name="specialty" class="select-control">
                        <option value="">Selecciona tu especialidad</option>
                        <option value="network" {{ old('specialty') == 'network' ? 'selected' : '' }}>Seguridad de Red</option>
                        <option value="app" {{ old('specialty') == 'app' ? 'selected' : '' }}>Seguridad de Aplicaciones</option>
                        <option value="cloud" {{ old('specialty') == 'cloud' ? 'selected' : '' }}>Seguridad en la Nube</option>
                        <option value="forensics" {{ old('specialty') == 'forensics' ? 'selected' : '' }}>Forensia Digital</option>
                        <option value="pentest" {{ old('specialty') == 'pentest' ? 'selected' : '' }}>Pruebas de Penetración</option>
                        <option value="governance" {{ old('specialty') == 'governance' ? 'selected' : '' }}>Gobernanza y Cumplimiento</option>
                        <option value="other" {{ old('specialty') == 'other' ? 'selected' : '' }}>Otra</option>
                    </select>
                </div>

                <div class="form-navigation">
                    <button type="button" class="btn btn-secondary" id="prev-3">Anterior</button>
                    <button type="submit" class="btn btn-primary" id="submit-btn">Completar Registro</button>
                </div>
            </div>
        </form>

        <div class="auth-switch">
            ¿Ya tienes una cuenta? <a href="{{ route('login') }}" class="auth-link">Inicia Sesión</a>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script>
<script>
    // Inicializar datepicker
    flatpickr("#birthdate", {
        dateFormat: "d/m/Y",
        maxDate: "today",
        locale: "es",
        disableMobile: "true",
        onChange: function(selectedDates, dateStr, instance) {
            // disparar evento input para que nuestra validación lo detecte
            instance.input.dispatchEvent(new Event('input', { bubbles: true }));
        }
    });

    // Estado de validación
    const fieldValidity = {
        name: false,
        paterno: false,
        materno: false,
        birthdate: false,
        sex: false,
        email: false,
        username: false,
        password: false,
        confirmPassword: false
    };

    // Validación de campos individuales
    function validateField(fieldId, value) {
        switch(fieldId) {
            case 'name':
            case 'paterno':
            case 'materno':
                return value.trim().length >= 2;
            case 'birthdate':
                return value.trim().length > 0;
            case 'email':
                return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value);
            case 'username':
                return /^[a-zA-Z0-9_]{3,20}$/.test(value);
            case 'password':
                const password = value || '';
                const hasLength = password.length >= 8;
                const hasUpper = /[A-Z]/.test(password);
                const hasLower = /[a-z]/.test(password);
                const hasNumber = /[0-9]/.test(password);
                const hasSpecial = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(password);
                return hasLength && hasUpper && hasLower && hasNumber && hasSpecial;
            case 'confirm-password':
                const confirmation = value || '';
                const original = document.getElementById('password') ? document.getElementById('password').value : '';
                return confirmation.length > 0 && confirmation === original;
            default:
                return false;
        }
    }

    // Actualizar apariencia del campo y estado
    function updateFieldAppearance(fieldId, isValid) {
        const field = document.getElementById(fieldId);
        const errorElement = document.getElementById(fieldId + '-error');

        // mapear fieldId a la propiedad de fieldValidity cuando sea necesario
        if (fieldId === 'confirm-password') {
            fieldValidity.confirmPassword = !!isValid;
        } else if (fieldId in fieldValidity) {
            fieldValidity[fieldId] = !!isValid;
        }

        if (field) {
            if (isValid) {
                field.classList.remove('error');
                field.classList.add('success');
            } else {
                field.classList.remove('success');
                field.classList.add('error');
            }
        }

        if (errorElement) {
            if (isValid) errorElement.classList.remove('show');
            else errorElement.classList.add('show');
        }
    }

    // Validación de radio buttons (sexo)
    function validateSex() {
        const selected = document.querySelector('input[name="sex"]:checked') !== null;
        fieldValidity.sex = selected;
        const sexError = document.getElementById('sex-error');
        if (sexError) {
            if (selected) sexError.classList.remove('show');
            else sexError.classList.add('show');
        }
    }

    // Actualizar requisitos de contraseña visualmente
    function updatePasswordRequirements(password) {
        const requirements = {
            length: password.length >= 8,
            uppercase: /[A-Z]/.test(password),
            lowercase: /[a-z]/.test(password),
            number: /[0-9]/.test(password),
            special: /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(password)
        };

        Object.keys(requirements).forEach(req => {
            const el = document.getElementById(`${req}-req`);
            if (!el) return;
            if (requirements[req]) {
                el.classList.remove('unmet');
                el.classList.add('met');
                el.querySelector('i').className = 'fas fa-check';
            } else {
                el.classList.remove('met');
                el.classList.add('unmet');
                el.querySelector('i').className = 'fas fa-times';
            }
        });

        const metCount = Object.values(requirements).filter(Boolean).length;
        const strengthEl = document.getElementById('password-strength');
        if (strengthEl) {
            strengthEl.className = 'password-strength' + (metCount <= 2 ? ' weak' : metCount <= 4 ? ' medium' : ' strong');
        }
    }

    // Habilitar/deshabilitar botones Siguiente según sección
    function checkSectionValidation(currentSection = null) {
        const c = currentSection || getCurrentSection();
        if (c === 1) {
            const valid = fieldValidity.name && fieldValidity.paterno && fieldValidity.birthdate && fieldValidity.sex;
            const next1 = document.getElementById('next-1');
            if (next1) next1.disabled = !valid;
        } else if (c === 2) {
            const valid = fieldValidity.email && fieldValidity.username && fieldValidity.password && fieldValidity.confirmPassword;
            const next2 = document.getElementById('next-2');
            if (next2) next2.disabled = !valid;
        }
    }

    // Obtener sección visible
    function getCurrentSection() {
        const sections = document.querySelectorAll('.form-section');
        for (let i = 0; i < sections.length; i++) {
            if (sections[i].classList.contains('active')) return i + 1;
        }
        return 1;
    }

    // Mostrar sección y actualizar progress
    function showSection(sectionNumber) {
        // validar avance si se intenta avanzar
        const current = getCurrentSection();
        if (sectionNumber > current) {
            if (current === 1) {
                const section1Valid = fieldValidity.name && fieldValidity.paterno && fieldValidity.birthdate && fieldValidity.sex;
                if (!section1Valid) {
                    alert('Por favor, completa todos los campos requeridos en la sección actual');
                    return;
                }
            } else if (current === 2) {
                const section2Valid = fieldValidity.email && fieldValidity.username && fieldValidity.password && fieldValidity.confirmPassword;
                if (!section2Valid) {
                    alert('Por favor, completa todos los campos requeridos en la sección actual');
                    return;
                }
            }
        }

        document.querySelectorAll('.form-section').forEach(section => section.classList.remove('active'));
        const target = document.getElementById('section-' + sectionNumber);
        if (target) target.classList.add('active');

        // actualizar progress
        document.querySelectorAll('.progress-step').forEach((step, idx) => {
            step.classList.remove('active', 'completed');
            const stepNum = idx + 1;
            if (stepNum < sectionNumber) step.classList.add('completed');
            else if (stepNum === sectionNumber) step.classList.add('active');
        });

        checkSectionValidation(sectionNumber);
    }

    // Configurar listeners para campos
    function setupFieldListeners() {
        const fields = ['name','paterno','materno','birthdate','email','username','password','confirm-password'];

        fields.forEach(fieldId => {
            const el = document.getElementById(fieldId);
            if (!el) return;

            el.addEventListener('input', function() {
                const isValid = validateField(fieldId, this.value);
                updateFieldAppearance(fieldId, isValid);

                // caso contraseña: actualizar requisitos y revalidar confirmación
                if (fieldId === 'password') {
                    updatePasswordRequirements(this.value);
                    const confirmEl = document.getElementById('confirm-password');
                    if (confirmEl && confirmEl.value) {
                        const confirmValid = validateField('confirm-password', confirmEl.value);
                        updateFieldAppearance('confirm-password', confirmValid);
                    }
                    // también actualizar estado 'password' en fieldValidity
                    fieldValidity.password = validateField('password', this.value);
                }

                if (fieldId === 'confirm-password') {
                    const passValid = validateField('password', document.getElementById('password').value || '');
                    fieldValidity.password = passValid;
                }

                checkSectionValidation();
            });

            el.addEventListener('blur', function() {
                const isValid = validateField(fieldId, this.value);
                updateFieldAppearance(fieldId, isValid);
                checkSectionValidation();
            });
        });

        // radios sexo
        document.querySelectorAll('input[name="sex"]').forEach(radio => {
            radio.addEventListener('change', function() {
                validateSex();
                checkSectionValidation();
            });
        });

        // toggle password visibility
        document.querySelectorAll('.toggle-password').forEach(btn => {
            btn.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');
                const input = document.getElementById(targetId);
                const icon = this.querySelector('i');
                if (!input) return;
                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                } else {
                    input.type = 'password';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                }
            });
        });
    }

    // Navegación botones
    function setupNavigation() {
        const next1 = document.getElementById('next-1');
        const prev2 = document.getElementById('prev-2');
        const next2 = document.getElementById('next-2');
        const prev3 = document.getElementById('prev-3');

        if (next1) next1.addEventListener('click', () => showSection(2));
        if (prev2) prev2.addEventListener('click', () => showSection(1));
        if (next2) next2.addEventListener('click', () => showSection(3));
        if (prev3) prev3.addEventListener('click', () => showSection(2));

        // Envío del formulario: validar antes de submit
        const form = document.getElementById('signup-form');
        if (form) {
            form.addEventListener('submit', function(e) {
                const section1Valid = fieldValidity.name && fieldValidity.paterno && fieldValidity.birthdate && fieldValidity.sex;
                const section2Valid = fieldValidity.email && fieldValidity.username && fieldValidity.password && fieldValidity.confirmPassword;
                if (!section1Valid || !section2Valid) {
                    e.preventDefault();
                    alert('Por favor, completa todos los campos requeridos');
                    if (!section1Valid) showSection(1);
                    else if (!section2Valid) showSection(2);
                }
            });
        }
    }

    // Inicialización
    function initializeForm() {
        setupFieldListeners();
        setupNavigation();

        // Validar valores ya presentes (old() de Laravel)
        const initialFields = ['name','paterno','materno','birthdate','email','username','password','confirm-password'];
        initialFields.forEach(id => {
            const el = document.getElementById(id);
            if (el && el.value) {
                const valid = validateField(id, el.value);
                updateFieldAppearance(id, valid);
                if (id === 'password') updatePasswordRequirements(el.value);
            }
        });

        validateSex();
        // forzar actualización de botones iniciales
        checkSectionValidation(1);
        checkSectionValidation(2);
    }

    // Ejecutar cuando DOM esté listo
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initializeForm);
    } else {
        initializeForm();
    }
</script>
</body>
</html>
