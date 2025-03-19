<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>شد بلاغات تيليجرام</title>
    <!-- إضافة خطوط Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">
    <!-- إضافة Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- إضافة أيقونات Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-bg: #f8f9fa; /* خلفية فاتحة */
            --primary-card: #ffffff; /* بطاقات بيضاء */
            --accent: #007bff; /* لون التمييز (أزرق) */
            --text-primary: #343a40; /* نص داكن */
            --border-color: #dee2e6; /* حدود فاتحة */
        }

        body {
            background: var(--primary-bg);
            color: var(--text-primary);
            font-family: 'Tajawal', sans-serif;
        }

        .card {
            background: var(--primary-card);
            border: 1px solid var(--border-color);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-control {
            background: var(--primary-card);
            border-color: var(--border-color);
            color: var(--text-primary);
        }

        .form-control:focus {
            background: var(--primary-card);
            border-color: var(--accent);
            box-shadow: 0 0 0 2px var(--accent);
        }

        .log-box {
            height: 300px;
            background: #f8f9fa;
            color: #343a40;
            font-family: monospace;
            overflow-y: auto;
            border: 1px solid var(--border-color);
            border-radius: 5px;
            padding: 10px;
        }

        .btn-primary {
            background-color: var(--accent);
            border-color: var(--accent);
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #c82333;
        }

        .input-group-text {
            background-color: var(--primary-card);
            border-color: var(--border-color);
            color: var(--text-primary);
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title"><i class="bi bi-envelope"></i> شد بلاغات تيليجرام</h5>
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope-at"></i></span>
                            <textarea class="form-control" id="emailAccounts" rows="5" placeholder="أدخل عناوين البريد وكلمات المرور (مفصولة بنقطتين)"></textarea>
                        </div>
                        <small class="text-muted">مثال: email1@gmail.com:password1</small>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-people"></i></span>
                            <select class="form-control" id="recipients" multiple>
                                <option value="stopCA@telegram.org">stopCA@telegram.org</option>
                                <option value="abuse@telegram.org">abuse@telegram.org</option>
                                <option value="support@telegram.org">support@telegram.org</option>
                                <option value="security@telegram.org">security@telegram.org</option>
                            </select>
                        </div>
                        <small class="text-muted">اختر عناوين البريد المستلم</small>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-list-ol"></i></span>
                        <input type="number" class="form-control" id="msgCount" placeholder="عدد الرسائل" min="1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-card-heading"></i></span>
                        <input type="text" class="form-control" id="subject" placeholder="موضوع الرسالة">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-chat-left-text"></i></span>
                        <textarea class="form-control" id="message" rows="5" placeholder="محتوى الرسالة"></textarea>
                    </div>
                </div>

                <!-- خيار Telegram -->
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="telegramCheck">
                        <label class="form-check-label" for="telegramCheck"><i class="bi bi-robot"></i> إدارة العملية عبر Telegram</label>
                    </div>
                    <div class="input-group mt-2">
                        <span class="input-group-text"><i class="bi bi-key"></i></span>
                        <input type="text" class="form-control" id="botToken" placeholder="أدخل توكن البوت" disabled>
                    </div>
                    <div class="input-group mt-2">
                        <span class="input-group-text"><i class="bi bi-chat"></i></span>
                        <input type="text" class="form-control" id="chatId" placeholder="أدخل Chat ID" disabled>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-md-6">
                        <button class="btn btn-primary w-100" onclick="startSending()" id="startBtn">
                            <i class="bi bi-send"></i> بدء الإرسال
                        </button>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-danger w-100" onclick="emergencyStop()" id="stopBtn" disabled>
                            <i class="bi bi-stop-circle"></i> إيقاف طارئ
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- لوحة السجلات -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><i class="bi bi-activity"></i> سجل النشاط</h5>
                <div class="log-box" id="logBox"></div>
            </div>
        </div>
    </div>

    <script>
        // حالة التطبيق
        let state = {
            isSending: false,
            totalMessages: 0,
            sent: 0,
            failed: 0,
            recipients: [],
            emailAccounts: [],
            telegramEnabled: false,
            botToken: '',
            chatId: ''
        };

        // تفعيل/تعطيل حقول Telegram
        document.getElementById('telegramCheck').addEventListener('change', function() {
            const telegramFields = document.querySelectorAll('#botToken, #chatId');
            telegramFields.forEach(field => field.disabled = !this.checked);
            state.telegramEnabled = this.checked;
        });

        // بدء الإرسال
        async function startSending() {
            const subject = document.getElementById('subject').value;
            const message = document.getElementById('message').value;
            const recipientsInput = document.getElementById('recipients');
            const emailAccountsInput = document.getElementById('emailAccounts').value;
            state.totalMessages = parseInt(document.getElementById('msgCount').value);

            // تحقق من المدخلات
            if (!subject || !message || state.totalMessages < 1 || !emailAccountsInput) {
                alert('يرجى ملء جميع الحقول!');
                return;
            }

            // تحضير قائمة المستلمين
            state.recipients = Array.from(recipientsInput.selectedOptions).map(option => option.value);

            // تحضير قائمة الحسابات
            state.emailAccounts = emailAccountsInput.split('\n').map(line => {
                const [email, password] = line.split(':');
                return { email: email.trim(), password: password.trim() };
            });

            // تحقق من Telegram
            if (state.telegramEnabled) {
                state.botToken = document.getElementById('botToken').value;
                state.chatId = document.getElementById('chatId').value;
                if (!state.botToken || !state.chatId) {
                    alert('يرجى إدخال توكن البوت و Chat ID!');
                    return;
                }
            }

            state.isSending = true;
            state.sent = 0;
            state.failed = 0;
            document.getElementById('startBtn').disabled = true;
            document.getElementById('stopBtn').disabled = false;

            // إرسال رسالة Telegram لبدء العملية
            if (state.telegramEnabled) {
                await sendTelegramMessage(`🚀 بدء عملية الإرسال:
الرسائل: ${state.totalMessages}
المستلمين: ${state.recipients.length}
الحسابات: ${state.emailAccounts.length}
`);
            }

            while (state.isSending && state.sent < state.totalMessages) {
                for (const account of state.emailAccounts) {
                    if (!state.isSending) break;

                    for (const recipient of state.recipients) {
                        if (!state.isSending) break;

                        try {
                            await sendEmail(account.email, account.password, recipient, subject, message);
                            state.sent++;
                            log(`تم إرسال البريد من ${account.email} إلى ${recipient}`);
                        } catch (error) {
                            state.failed++;
                            log(`فشل الإرسال من ${account.email} إلى ${recipient}: ${error}`);
                        }

                        updateCounters();
                        await new Promise(r => setTimeout(r, 500)); // تأخير لتجنب الإيقاف
                    }
                }
            }

            stopSending();
            log('تم الانتهاء من عملية الإرسال');

            // إرسال رسالة Telegram لإنهاء العملية
            if (state.telegramEnabled) {
                await sendTelegramMessage(`✅ تم الانتهاء من عملية الإرسال:
الرسائل المرسلة: ${state.sent}
الرسائل الفاشلة: ${state.failed}
`);
            }
        }

        // إرسال بريد إلكتروني (دمج PHP مع fetch)
        async function sendEmail(email, password, recipient, subject, message) {
            try {
                const response = await fetch('send_email.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ email, password, recipient, subject, message })
                });

                const result = await response.json();
                if (result.status === 'success') {
                    return true;
                } else {
                    throw new Error(result.message);
                }
            } catch (error) {
                throw new Error('فشل في الإرسال');
            }
        }

        // إرسال رسالة إلى Telegram
        async function sendTelegramMessage(text) {
            const url = `https://api.telegram.org/bot${state.botToken}/sendMessage`;
            const params = {
                chat_id: state.chatId,
                text: text,
                reply_markup: JSON.stringify({
                    inline_keyboard: [[{ text: 'إيقاف العملية', callback_data: 'stop' }]]
                })
            };

            try {
                await fetch(url, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(params)
                });
            } catch (error) {
                log('فشل إرسال الرسالة إلى Telegram');
            }
        }

        // إيقاف طارئ
        function emergencyStop() {
            state.isSending = false;
            stopSending();
            log('تم إيقاف العملية يدويًا');

            // إرسال رسالة Telegram للإيقاف
            if (state.telegramEnabled) {
                sendTelegramMessage('🛑 تم إيقاف العملية يدويًا. @xcscm');
            }
        }

        // إيقاف الإرسال
        function stopSending() {
            document.getElementById('startBtn').disabled = false;
            document.getElementById('stopBtn').disabled = true;
            state.isSending = false;
        }

        // تحديث العدادات
        function updateCounters() {
            document.getElementById('sentCount').textContent = state.sent;
            document.getElementById('failedCount').textContent = state.failed;
            document.getElementById('remainingCount').textContent = state.totalMessages - state.sent - state.failed;
        }

        // تسجيل النشاط
        function log(message) {
            const logBox = document.getElementById('logBox');
            logBox.innerHTML += `[${new Date().toLocaleTimeString()}] ${message}\n`;
            logBox.scrollTop = logBox.scrollHeight;
        }
    </script>
</body>
</html>
