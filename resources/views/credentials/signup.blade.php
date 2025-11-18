<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Cryto Guard</title>
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

        <!-- Progress Indicator -->
        <div class="form-progress">
            <div class="progress-step completed">1</div>
            <div class="progress-step active">2</div>
            <div class="progress-step">3</div>
        </div>

        <form class="auth-form" id="signup-form">
            <!-- Sección 1: Información Personal -->
            <div class="form-section active" id="section-1">
                <div class="form-group">
                    <label for="name">Nombre *</label>
                    <input type="text" id="name" class="form-control" placeholder="Tu nombre" required>
                    <div class="error-message" id="name-error">El nombre es obligatorio y debe tener al menos 2 caracteres</div>
                </div>
                
                <div class="form-group">
                    <label for="paterno">Apellido Paterno *</label>
                    <input type="text" id="paterno" class="form-control" placeholder="Apellido paterno" required>
                    <div class="error-message" id="paterno-error">El apellido paterno es obligatorio</div>
                </div>
                
                <div class="form-group">
                    <label for="materno">Apellido Materno *</label>
                    <input type="text" id="materno" class="form-control" placeholder="Apellido materno" required>
                    <div class="error-message" id="materno-error">El apellido materno es obligatorio</div>
                </div>
                
                <div class="form-group">
                    <label for="birthdate">Fecha de Nacimiento *</label>
                    <input type="text" id="birthdate" class="form-control flatpickr-input" placeholder="Selecciona tu fecha de nacimiento" readonly>
                    <div class="error-message" id="birthdate-error">Debes tener al menos 18 años para registrarte</div>
                </div>
                
                <div class="form-group">
                    <label>Sexo *</label>
                    <div class="radio-group">
                        <label class="radio-option">
                            <input type="radio" name="sex" value="male" required>
                            <span>Masculino</span>
                        </label>
                        <label class="radio-option">
                            <input type="radio" name="sex" value="female">
                            <span>Femenino</span>
                        </label>
                        <label class="radio-option">
                            <input type="radio" name="sex" value="other">
                            <span>Otro</span>
                        </label>
                    </div>
                    <div class="error-message" id="sex-error">Debes seleccionar una opción</div>
                </div>
                
                <div class="form-navigation">
                    <button type="button" class="btn btn-primary" id="next-1">Siguiente</button>
                </div>
            </div>

            <!-- Sección 2: Información de Cuenta -->
            <div class="form-section" id="section-2">
                <div class="form-group">
                    <label for="email">Correo Electrónico *</label>
                    <input type="email" id="email" class="form-control" placeholder="tu.correo@ejemplo.com" required>
                    <div class="error-message" id="email-error">Ingresa un correo electrónico válido</div>
                </div>
                
                <div class="form-group">
                    <label for="username">Nombre de Usuario *</label>
                    <input type="text" id="username" class="form-control" placeholder="Elige un nombre de usuario" required>
                    <div class="error-message" id="username-error">El nombre de usuario debe tener entre 3 y 20 caracteres (solo letras, números y _)</div>
                </div>
                
                <div class="form-group">
                    <label for="password">Contraseña *</label>
                    <div class="password-container">
                        <input type="password" id="password" class="form-control" placeholder="Crea una contraseña segura" required>
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
                    <label for="confirm-password">Confirmar Contraseña *</label>
                    <div class="password-container">
                        <input type="password" id="confirm-password" class="form-control" placeholder="Repite tu contraseña" required>
                        <button type="button" class="toggle-password" data-target="confirm-password">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    <div class="error-message" id="confirm-password-error">Las contraseñas no coinciden</div>
                </div>
                
                <div class="form-navigation">
                    <button type="button" class="btn btn-secondary" id="prev-2">Anterior</button>
                    <button type="button" class="btn btn-primary" id="next-2">Siguiente</button>
                </div>
            </div>

            <!-- Sección 3: Información Profesional -->
            <div class="form-section" id="section-3">
                <div class="form-group">
                    <label for="company">Empresa</label>
                    <input type="text" id="company" class="form-control" placeholder="Nombre de tu empresa (opcional)">
                </div>
                
                <div class="form-group">
                    <label for="role">Rol en Ciberseguridad</label>
                    <select id="role" class="select-control">
                        <option value="">Selecciona tu rol</option>
                        <option value="analyst">Analista de Seguridad</option>
                        <option value="engineer">Ingeniero de Seguridad</option>
                        <option value="consultant">Consultor</option>
                        <option value="researcher">Investigador</option>
                        <option value="student">Estudiante</option>
                        <option value="enthusiast">Entusiasta</option>
                        <option value="other">Otro</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="experience">Años de Experiencia</label>
                    <select id="experience" class="select-control">
                        <option value="">Selecciona años de experiencia</option>
                        <option value="0-2">0-2 años</option>
                        <option value="3-5">3-5 años</option>
                        <option value="6-10">6-10 años</option>
                        <option value="10+">Más de 10 años</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="specialty">Especialidad Principal</label>
                    <select id="specialty" class="select-control">
                        <option value="">Selecciona tu especialidad</option>
                        <option value="network">Seguridad de Red</option>
                        <option value="app">Seguridad de Aplicaciones</option>
                        <option value="cloud">Seguridad en la Nube</option>
                        <option value="forensics">Forensia Digital</option>
                        <option value="pentest">Pruebas de Penetración</option>
                        <option value="governance">Gobernanza y Cumplimiento</option>
                        <option value="other">Otra</option>
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
            disableMobile: "true"
        });

        // Objeto para almacenar el estado de validación
        const validationState = {
            section1: false,
            section2: false
        };

        // Toggle password visibility
        document.querySelectorAll('.toggle-password').forEach(button => {
            button.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');
                const passwordInput = document.getElementById(targetId);
                const icon = this.querySelector('i');
                
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                } else {
                    passwordInput.type = 'password';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                }
            });
        });

        // Validaciones en tiempo real
        function setupValidations() {
            // Validación de nombre
            document.getElementById('name').addEventListener('blur', function() {
                const value = this.value.trim();
                const isValid = value.length >= 2;
                updateFieldValidation('name', isValid, 'El nombre debe tener al menos 2 caracteres');
            });

            // Validación de apellidos
            document.getElementById('paterno').addEventListener('blur', function() {
                const value = this.value.trim();
                const isValid = value.length >= 2;
                updateFieldValidation('paterno', isValid, 'El apellido paterno es obligatorio');
            });

            document.getElementById('materno').addEventListener('blur', function() {
                const value = this.value.trim();
                const isValid = value.length >= 2;
                updateFieldValidation('materno', isValid, 'El apellido materno es obligatorio');
            });

            // Validación de fecha de nacimiento
            document.getElementById('birthdate').addEventListener('change', function() {
                const value = this.value;
                if (!value) {
                    updateFieldValidation('birthdate', false, 'La fecha de nacimiento es obligatoria');
                    return;
                }
                
                const birthDate = new Date(value.split('/').reverse().join('-'));
                const today = new Date();
                const age = today.getFullYear() - birthDate.getFullYear();
                const monthDiff = today.getMonth() - birthDate.getMonth();
                
                let isValid = false;
                if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
                    isValid = (age - 1) >= 18;
                } else {
                    isValid = age >= 18;
                }
                
                updateFieldValidation('birthdate', isValid, 'Debes tener al menos 18 años para registrarte');
            });

            // Validación de sexo
            document.querySelectorAll('input[name="sex"]').forEach(radio => {
                radio.addEventListener('change', function() {
                    const isSelected = document.querySelector('input[name="sex"]:checked') !== null;
                    updateFieldValidation('sex', isSelected, 'Debes seleccionar una opción');
                });
            });

            // Validación de email
            document.getElementById('email').addEventListener('blur', function() {
                const value = this.value.trim();
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                const isValid = emailRegex.test(value);
                updateFieldValidation('email', isValid, 'Ingresa un correo electrónico válido');
            });

            // Validación de username
            document.getElementById('username').addEventListener('blur', function() {
                const value = this.value.trim();
                const usernameRegex = /^[a-zA-Z0-9_]{3,20}$/;
                const isValid = usernameRegex.test(value);
                updateFieldValidation('username', isValid, 'El nombre de usuario debe tener entre 3 y 20 caracteres (solo letras, números y _)');
            });

            // Validación de contraseña
            document.getElementById('password').addEventListener('input', function() {
                validatePassword(this.value);
            });

            // Validación de confirmación de contraseña
            document.getElementById('confirm-password').addEventListener('blur', function() {
                const password = document.getElementById('password').value;
                const confirmPassword = this.value;
                const isValid = password === confirmPassword && password.length > 0;
                updateFieldValidation('confirm-password', isValid, 'Las contraseñas no coinciden');
            });
        }

        // Función para validar la contraseña
        function validatePassword(password) {
            const requirements = {
                length: password.length >= 8,
                uppercase: /[A-Z]/.test(password),
                lowercase: /[a-z]/.test(password),
                number: /[0-9]/.test(password),
                special: /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(password)
            };

            // Actualizar indicadores visuales de requisitos
            Object.keys(requirements).forEach(req => {
                const element = document.getElementById(`${req}-req`);
                if (requirements[req]) {
                    element.classList.remove('unmet');
                    element.classList.add('met');
                    element.querySelector('i').className = 'fas fa-check';
                } else {
                    element.classList.remove('met');
                    element.classList.add('unmet');
                    element.querySelector('i').className = 'fas fa-times';
                }
            });

            // Calcular fortaleza de la contraseña
            const metCount = Object.values(requirements).filter(Boolean).length;
            const strengthElement = document.getElementById('password-strength');
            
            if (metCount <= 2) {
                strengthElement.className = 'password-strength weak';
            } else if (metCount <= 4) {
                strengthElement.className = 'password-strength medium';
            } else {
                strengthElement.className = 'password-strength strong';
            }

            // Validar si cumple todos los requisitos
            const isValid = Object.values(requirements).every(Boolean);
            updateFieldValidation('password', isValid, 'La contraseña no cumple con los requisitos de seguridad');
            
            return isValid;
        }

        // Función para actualizar el estado de validación de un campo
        function updateFieldValidation(fieldId, isValid, errorMessage) {
            const field = document.getElementById(fieldId);
            const errorElement = document.getElementById(`${fieldId}-error`);
            
            if (isValid) {
                field.classList.remove('error');
                field.classList.add('success');
                errorElement.classList.remove('show');
            } else {
                field.classList.remove('success');
                field.classList.add('error');
                errorElement.textContent = errorMessage;
                errorElement.classList.add('show');
            }
            
            // Actualizar estado de validación de la sección
            validateCurrentSection();
        }

        // Validar si la sección actual es válida
        function validateCurrentSection() {
            if (currentSection === 1) {
                const nameValid = document.getElementById('name').classList.contains('success');
                const paternoValid = document.getElementById('paterno').classList.contains('success');
                const maternoValid = document.getElementById('materno').classList.contains('success');
                const birthdateValid = document.getElementById('birthdate').classList.contains('success');
                const sexValid = document.querySelector('input[name="sex"]:checked') !== null;
                
                validationState.section1 = nameValid && paternoValid && maternoValid && birthdateValid && sexValid;
                document.getElementById('next-1').disabled = !validationState.section1;
            } else if (currentSection === 2) {
                const emailValid = document.getElementById('email').classList.contains('success');
                const usernameValid = document.getElementById('username').classList.contains('success');
                const passwordValid = document.getElementById('password').classList.contains('success');
                const confirmPasswordValid = document.getElementById('confirm-password').classList.contains('success');
                
                validationState.section2 = emailValid && usernameValid && passwordValid && confirmPasswordValid;
                document.getElementById('next-2').disabled = !validationState.section2;
            }
        }

        // Navegación entre secciones del formulario
        let currentSection = 1;
        const totalSections = 3;

        function showSection(sectionNumber) {
            // Validar sección actual antes de cambiar
            if (sectionNumber > currentSection) {
                if (currentSection === 1 && !validationState.section1) {
                    alert('Por favor, completa todos los campos requeridos en la sección actual');
                    return;
                }
                if (currentSection === 2 && !validationState.section2) {
                    alert('Por favor, completa todos los campos requeridos en la sección actual');
                    return;
                }
            }
            
            // Ocultar todas las secciones
            document.querySelectorAll('.form-section').forEach(section => {
                section.classList.remove('active');
            });
            
            // Mostrar la sección actual
            document.getElementById(`section-${sectionNumber}`).classList.add('active');
            
            // Actualizar progress indicator
            document.querySelectorAll('.progress-step').forEach((step, index) => {
                step.classList.remove('active', 'completed');
                if (index + 1 < sectionNumber) {
                    step.classList.add('completed');
                } else if (index + 1 === sectionNumber) {
                    step.classList.add('active');
                }
            });
            
            currentSection = sectionNumber;
            
            // Actualizar estado de botones
            validateCurrentSection();
        }

        // Event listeners para navegación
        document.getElementById('next-1').addEventListener('click', () => showSection(2));
        document.getElementById('prev-2').addEventListener('click', () => showSection(1));
        document.getElementById('next-2').addEventListener('click', () => showSection(3));
        document.getElementById('prev-3').addEventListener('click', () => showSection(2));

        // Validación del formulario al enviar
        document.getElementById('signup-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Validar todas las secciones
            if (!validationState.section1 || !validationState.section2) {
                alert('Por favor, completa todos los campos requeridos antes de enviar el formulario');
                // Ir a la primera sección con errores
                if (!validationState.section1) {
                    showSection(1);
                } else if (!validationState.section2) {
                    showSection(2);
                }
                return;
            }
            
            // Aquí iría la lógica de envío del formulario
            alert('¡Registro completado! Serás redirigido al dashboard.');
            
            // Simular envío exitoso
            setTimeout(() => {
                window.location.href = '/dashboard';
            }, 2000);
        });

        // Inicializar validaciones
        setupValidations();
        validateCurrentSection();
    </script>
</body>
</html>