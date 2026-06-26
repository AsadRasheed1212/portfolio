@extends('layouts.app')
@section('title','Services & Pricing — Portfolio')
@section('content')

<style>
.pkg-tab-active { background:#6EC1E4 !important; color:#0D0D0D !important; }
.feat-no { color:rgba(255,255,255,.25) !important; }
.feat-no::before { content:'✕' !important; color:rgba(255,255,255,.2) !important; }
.gig-card { background:#161616; border:1px solid rgba(255,255,255,.08); border-radius:8px; overflow:hidden; transition:border-color .25s, transform .25s; }
.gig-card:hover { border-color:#6EC1E4; transform:translateY(-4px); }
.pkg-tab { flex:1; padding:7px 4px; font-size:12px; font-weight:500; text-align:center; cursor:pointer; transition:all .2s; color:#9F9F9F; background:transparent; border:none; }
.pay-card { background:#161616; border:1px solid rgba(255,255,255,.08); border-radius:7px; padding:20px; transition:border-color .25s; }
.pay-card:hover { border-color:#6EC1E4; }
.copy-btn { display:inline-block; margin-top:10px; font-size:11px; padding:5px 12px; border:1px solid rgba(110,193,228,.35); color:#6EC1E4; border-radius:3px; cursor:pointer; background:transparent; transition:all .2s; }
.copy-btn:hover { background:#6EC1E4; color:#0D0D0D; }
</style>

<section style="padding:140px 0 80px;">
<div style="max-width:1160px;margin:0 auto;padding:0 24px;">

    {{-- Header --}}
    <div class="text-center mb-16 rv">
        <div class="eyebrow">What I Offer</div>
        <h1 class="font-slab text-[clamp(30px,4vw,52px)] font-medium text-white leading-[1.15] mb-4">Services & Pricing</h1>
        <p class="text-mid max-w-[540px] mx-auto">Basic, Standard, ya Premium — jo suit kare choose karo. Order ke baad direct payment kar saktay ho.</p>
    </div>

    {{-- GIG CARDS --}}
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:20px;" class="rv">

        {{-- GIG 1: Laravel --}}
        <div class="gig-card">
            <div style="height:120px;display:flex;align-items:center;justify-content:center;font-size:44px;background:#0D0D0D;border-bottom:1px solid rgba(255,255,255,.06);">⚡</div>
            <div style="padding:18px;">
                <div style="font-size:10px;letter-spacing:2px;text-transform:uppercase;color:#6EC1E4;font-weight:500;margin-bottom:5px;">Laravel Development</div>
                <div class="font-slab" style="font-size:15px;color:#fff;font-weight:500;line-height:1.35;margin-bottom:10px;">I will build a Laravel web application for you</div>
                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:12px;">
                    <span style="font-size:11px;color:#FFD700;">★ 5.0</span>
                    <span style="font-size:10px;padding:2px 8px;border-radius:2px;background:rgba(110,193,228,.1);color:#6EC1E4;border:1px solid rgba(110,193,228,.2);">Top Rated</span>
                    <span id="g1-badge" style="font-size:10px;padding:2px 8px;border-radius:2px;background:rgba(97,206,112,.08);color:#61CE70;border:1px solid rgba(97,206,112,.18);">5 din delivery</span>
                </div>
                <div style="display:flex;border:1px solid rgba(255,255,255,.08);border-radius:4px;overflow:hidden;margin-bottom:12px;">
                    <button class="pkg-tab pkg-tab-active" onclick="sw(this,'g1','basic')">Basic</button>
                    <button class="pkg-tab" onclick="sw(this,'g1','standard')">Standard</button>
                    <button class="pkg-tab" onclick="sw(this,'g1','premium')">Premium</button>
                </div>
                <div style="background:rgba(255,255,255,.03);border:1px solid rgba(255,255,255,.06);border-radius:4px;padding:12px;margin-bottom:12px;">
                    <div class="font-slab" style="font-size:22px;color:#fff;font-weight:500;margin-bottom:3px;" id="g1-price">Rs 5,000</div>
                    <div style="font-size:11px;color:#9F9F9F;margin-bottom:9px;" id="g1-label">Simple CRUD · 5 din delivery · 1 revision</div>
                    <ul style="list-style:none;display:flex;flex-direction:column;gap:5px;" id="g1-feats">
                        <li style="font-size:11px;color:#9F9F9F;display:flex;align-items:center;gap:5px;"><span style="color:#61CE70;font-size:10px;">✓</span>Laravel setup & config</li>
                        <li style="font-size:11px;color:#9F9F9F;display:flex;align-items:center;gap:5px;"><span style="color:#61CE70;font-size:10px;">✓</span>1 module (CRUD)</li>
                        <li style="font-size:11px;color:#9F9F9F;display:flex;align-items:center;gap:5px;"><span style="color:#61CE70;font-size:10px;">✓</span>MySQL database</li>
                        <li style="font-size:11px;color:#9F9F9F;display:flex;align-items:center;gap:5px;"><span style="color:#61CE70;font-size:10px;">✓</span>Basic Blade UI</li>
                        <li class="feat-no" style="font-size:11px;display:flex;align-items:center;gap:5px;"><span style="font-size:10px;">✕</span>Authentication system</li>
                        <li class="feat-no" style="font-size:11px;display:flex;align-items:center;gap:5px;"><span style="font-size:10px;">✕</span>Admin panel</li>
                    </ul>
                </div>
                <button id="g1-btn" onclick="orderNow('Laravel Development','Basic','Rs 5,000')"
                    style="display:block;width:100%;padding:9px;background:transparent;border:1px solid #6EC1E4;color:#6EC1E4;border-radius:3px;font-size:12px;font-weight:500;cursor:pointer;transition:all .25s;"
                    onmouseover="this.style.background='#6EC1E4';this.style.color='#0D0D0D'"
                    onmouseout="this.style.background='transparent';this.style.color='#6EC1E4'">
                    Order Now (Rs 5,000)
                </button>
            </div>
        </div>

        {{-- GIG 2: Data Entry --}}
        <div class="gig-card">
            <div style="height:120px;display:flex;align-items:center;justify-content:center;font-size:44px;background:#0D0D0D;border-bottom:1px solid rgba(255,255,255,.06);">📊</div>
            <div style="padding:18px;">
                <div style="font-size:10px;letter-spacing:2px;text-transform:uppercase;color:#6EC1E4;font-weight:500;margin-bottom:5px;">Data Entry & Excel</div>
                <div class="font-slab" style="font-size:15px;color:#fff;font-weight:500;line-height:1.35;margin-bottom:10px;">I will do data entry, Excel reports & spreadsheet work</div>
                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:12px;">
                    <span style="font-size:11px;color:#FFD700;">★ 4.9</span>
                    <span style="font-size:10px;padding:2px 8px;border-radius:2px;background:rgba(110,193,228,.1);color:#6EC1E4;border:1px solid rgba(110,193,228,.2);">Level 2</span>
                    <span id="g2-badge" style="font-size:10px;padding:2px 8px;border-radius:2px;background:rgba(97,206,112,.08);color:#61CE70;border:1px solid rgba(97,206,112,.18);">5 din delivery</span>
                </div>
                <div style="display:flex;border:1px solid rgba(255,255,255,.08);border-radius:4px;overflow:hidden;margin-bottom:12px;">
                    <button class="pkg-tab pkg-tab-active" onclick="sw(this,'g2','basic')">Basic</button>
                    <button class="pkg-tab" onclick="sw(this,'g2','standard')">Standard</button>
                    <button class="pkg-tab" onclick="sw(this,'g2','premium')">Premium</button>
                </div>
                <div style="background:rgba(255,255,255,.03);border:1px solid rgba(255,255,255,.06);border-radius:4px;padding:12px;margin-bottom:12px;">
                    <div class="font-slab" style="font-size:22px;color:#fff;font-weight:500;margin-bottom:3px;" id="g2-price">Rs 1,500</div>
                    <div style="font-size:11px;color:#9F9F9F;margin-bottom:9px;" id="g2-label">200 rows tak · 5 din delivery · 1 revision</div>
                    <ul style="list-style:none;display:flex;flex-direction:column;gap:5px;" id="g2-feats">
                        <li style="font-size:11px;color:#9F9F9F;display:flex;align-items:center;gap:5px;"><span style="color:#61CE70;font-size:10px;">✓</span>200 rows tak</li>
                        <li style="font-size:11px;color:#9F9F9F;display:flex;align-items:center;gap:5px;"><span style="color:#61CE70;font-size:10px;">✓</span>Data cleaning</li>
                        <li style="font-size:11px;color:#9F9F9F;display:flex;align-items:center;gap:5px;"><span style="color:#61CE70;font-size:10px;">✓</span>Basic formatting</li>
                        <li class="feat-no" style="font-size:11px;display:flex;align-items:center;gap:5px;"><span style="font-size:10px;">✕</span>Formulas & functions</li>
                        <li class="feat-no" style="font-size:11px;display:flex;align-items:center;gap:5px;"><span style="font-size:10px;">✕</span>Charts & pivot tables</li>
                        <li class="feat-no" style="font-size:11px;display:flex;align-items:center;gap:5px;"><span style="font-size:10px;">✕</span>Automated reports</li>
                    </ul>
                </div>
                <button id="g2-btn" onclick="orderNow('Data Entry & Excel','Basic','Rs 1,500')"
                    style="display:block;width:100%;padding:9px;background:transparent;border:1px solid #6EC1E4;color:#6EC1E4;border-radius:3px;font-size:12px;font-weight:500;cursor:pointer;transition:all .25s;"
                    onmouseover="this.style.background='#6EC1E4';this.style.color='#0D0D0D'"
                    onmouseout="this.style.background='transparent';this.style.color='#6EC1E4'">
                    Order Now (Rs 1,500)
                </button>
            </div>
        </div>

        {{-- GIG 3: Video Editing --}}
        <div class="gig-card">
            <div style="height:120px;display:flex;align-items:center;justify-content:center;font-size:44px;background:#0D0D0D;border-bottom:1px solid rgba(255,255,255,.06);">🎬</div>
            <div style="padding:18px;">
                <div style="font-size:10px;letter-spacing:2px;text-transform:uppercase;color:#6EC1E4;font-weight:500;margin-bottom:5px;">Video Editing</div>
                <div class="font-slab" style="font-size:15px;color:#fff;font-weight:500;line-height:1.35;margin-bottom:10px;">I will edit your video for reels, ads, or YouTube</div>
                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:12px;">
                    <span style="font-size:11px;color:#FFD700;">★ 5.0</span>
                    <span id="g3-badge" style="font-size:10px;padding:2px 8px;border-radius:2px;background:rgba(97,206,112,.08);color:#61CE70;border:1px solid rgba(97,206,112,.18);">5 din delivery</span>
                </div>
                <div style="display:flex;border:1px solid rgba(255,255,255,.08);border-radius:4px;overflow:hidden;margin-bottom:12px;">
                    <button class="pkg-tab pkg-tab-active" onclick="sw(this,'g3','basic')">Basic</button>
                    <button class="pkg-tab" onclick="sw(this,'g3','standard')">Standard</button>
                    <button class="pkg-tab" onclick="sw(this,'g3','premium')">Premium</button>
                </div>
                <div style="background:rgba(255,255,255,.03);border:1px solid rgba(255,255,255,.06);border-radius:4px;padding:12px;margin-bottom:12px;">
                    <div class="font-slab" style="font-size:22px;color:#fff;font-weight:500;margin-bottom:3px;" id="g3-price">Rs 2,000</div>
                    <div style="font-size:11px;color:#9F9F9F;margin-bottom:9px;" id="g3-label">2 min video · 5 din delivery · 1 revision</div>
                    <ul style="list-style:none;display:flex;flex-direction:column;gap:5px;" id="g3-feats">
                        <li style="font-size:11px;color:#9F9F9F;display:flex;align-items:center;gap:5px;"><span style="color:#61CE70;font-size:10px;">✓</span>2 min tak video</li>
                        <li style="font-size:11px;color:#9F9F9F;display:flex;align-items:center;gap:5px;"><span style="color:#61CE70;font-size:10px;">✓</span>Basic cuts & transitions</li>
                        <li style="font-size:11px;color:#9F9F9F;display:flex;align-items:center;gap:5px;"><span style="color:#61CE70;font-size:10px;">✓</span>Background music</li>
                        <li class="feat-no" style="font-size:11px;display:flex;align-items:center;gap:5px;"><span style="font-size:10px;">✕</span>Motion graphics</li>
                        <li class="feat-no" style="font-size:11px;display:flex;align-items:center;gap:5px;"><span style="font-size:10px;">✕</span>Color grading</li>
                        <li class="feat-no" style="font-size:11px;display:flex;align-items:center;gap:5px;"><span style="font-size:10px;">✕</span>Custom intro/outro</li>
                    </ul>
                </div>
                <button id="g3-btn" onclick="orderNow('Video Editing','Basic','Rs 2,000')"
                    style="display:block;width:100%;padding:9px;background:transparent;border:1px solid #6EC1E4;color:#6EC1E4;border-radius:3px;font-size:12px;font-weight:500;cursor:pointer;transition:all .25s;"
                    onmouseover="this.style.background='#6EC1E4';this.style.color='#0D0D0D'"
                    onmouseout="this.style.background='transparent';this.style.color='#6EC1E4'">
                    Order Now (Rs 2,000)
                </button>
            </div>
        </div>

        {{-- GIG 4: WordPress --}}
        <div class="gig-card">
            <div style="height:120px;display:flex;align-items:center;justify-content:center;font-size:44px;background:#0D0D0D;border-bottom:1px solid rgba(255,255,255,.06);">📝</div>
            <div style="padding:18px;">
                <div style="font-size:10px;letter-spacing:2px;text-transform:uppercase;color:#6EC1E4;font-weight:500;margin-bottom:5px;">WordPress Management</div>
                <div class="font-slab" style="font-size:15px;color:#fff;font-weight:500;line-height:1.35;margin-bottom:10px;">I will manage or fix your WordPress website</div>
                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:12px;">
                    <span style="font-size:11px;color:#FFD700;">★ 4.8</span>
                    <span id="g4-badge" style="font-size:10px;padding:2px 8px;border-radius:2px;background:rgba(97,206,112,.08);color:#61CE70;border:1px solid rgba(97,206,112,.18);">5 din delivery</span>
                </div>
                <div style="display:flex;border:1px solid rgba(255,255,255,.08);border-radius:4px;overflow:hidden;margin-bottom:12px;">
                    <button class="pkg-tab pkg-tab-active" onclick="sw(this,'g4','basic')">Basic</button>
                    <button class="pkg-tab" onclick="sw(this,'g4','standard')">Standard</button>
                    <button class="pkg-tab" onclick="sw(this,'g4','premium')">Premium</button>
                </div>
                <div style="background:rgba(255,255,255,.03);border:1px solid rgba(255,255,255,.06);border-radius:4px;padding:12px;margin-bottom:12px;">
                    <div class="font-slab" style="font-size:22px;color:#fff;font-weight:500;margin-bottom:3px;" id="g4-price">Rs 2,000</div>
                    <div style="font-size:11px;color:#9F9F9F;margin-bottom:9px;" id="g4-label">Minor fixes · 5 din delivery · 1 revision</div>
                    <ul style="list-style:none;display:flex;flex-direction:column;gap:5px;" id="g4-feats">
                        <li style="font-size:11px;color:#9F9F9F;display:flex;align-items:center;gap:5px;"><span style="color:#61CE70;font-size:10px;">✓</span>Content updates</li>
                        <li style="font-size:11px;color:#9F9F9F;display:flex;align-items:center;gap:5px;"><span style="color:#61CE70;font-size:10px;">✓</span>Plugin installation</li>
                        <li style="font-size:11px;color:#9F9F9F;display:flex;align-items:center;gap:5px;"><span style="color:#61CE70;font-size:10px;">✓</span>Minor bug fixes</li>
                        <li class="feat-no" style="font-size:11px;display:flex;align-items:center;gap:5px;"><span style="font-size:10px;">✕</span>Theme customization</li>
                        <li class="feat-no" style="font-size:11px;display:flex;align-items:center;gap:5px;"><span style="font-size:10px;">✕</span>Speed optimization</li>
                        <li class="feat-no" style="font-size:11px;display:flex;align-items:center;gap:5px;"><span style="font-size:10px;">✕</span>WooCommerce setup</li>
                    </ul>
                </div>
                <button id="g4-btn" onclick="orderNow('WordPress Management','Basic','Rs 2,000')"
                    style="display:block;width:100%;padding:9px;background:transparent;border:1px solid #6EC1E4;color:#6EC1E4;border-radius:3px;font-size:12px;font-weight:500;cursor:pointer;transition:all .25s;"
                    onmouseover="this.style.background='#6EC1E4';this.style.color='#0D0D0D'"
                    onmouseout="this.style.background='transparent';this.style.color='#6EC1E4'">
                    Order Now (Rs 2,000)
                </button>
            </div>
        </div>

    </div>{{-- end gig grid --}}

    {{-- ORDER MODAL (hidden by default) --}}
    <div id="order-modal" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,.75);z-index:500;align-items:center;justify-content:center;">
        <div style="background:#161616;border:1px solid rgba(255,255,255,.12);border-radius:10px;padding:32px;max-width:420px;width:90%;position:relative;">
            <button onclick="closeModal()" style="position:absolute;top:14px;right:16px;background:none;border:none;color:#9F9F9F;font-size:20px;cursor:pointer;">✕</button>
            <div class="eyebrow" style="margin-bottom:6px;">Order Confirm</div>
            <div class="font-slab" style="font-size:20px;color:#fff;font-weight:500;margin-bottom:4px;" id="modal-title">–</div>
            <div style="font-size:13px;color:#9F9F9F;margin-bottom:20px;" id="modal-sub">–</div>
            <div style="font-size:13px;color:#9F9F9F;margin-bottom:18px;line-height:1.7;">
                Payment karo, phir screenshot WhatsApp ya Contact Form ke zariye bhejo. Payment confirm hote hi kaam shuru hoga.
            </div>
            <a href="{{ route('contact') }}" style="display:block;width:100%;padding:11px;background:#6EC1E4;color:#0D0D0D;border-radius:3px;font-size:13px;font-weight:500;text-align:center;text-decoration:none;margin-bottom:10px;">
                Contact Form se Bhejo
            </a>
            <a href="https://wa.me/923162432749" target="_blank" style="display:block;width:100%;padding:11px;background:transparent;border:1px solid #61CE70;color:#61CE70;border-radius:3px;font-size:13px;font-weight:500;text-align:center;text-decoration:none;">
                WhatsApp pe Bhejo
            </a>
        </div>
    </div>

    {{-- PAYMENT METHODS --}}
    <div style="margin-top:64px;background:#0F0F0F;border:1px solid rgba(255,255,255,.07);border-radius:10px;padding:36px 28px;" class="rv">
        <div class="eyebrow" style="margin-bottom:6px;">Payment Methods</div>
        <div class="font-slab" style="font-size:24px;color:#fff;font-weight:500;margin-bottom:6px;">In tareeqon se payment karo</div>
        <p style="font-size:14px;color:#9F9F9F;margin-bottom:28px;">Amount send karo → screenshot WhatsApp ya Contact Form pe bhejo → kaam shuru!</p>

        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(210px,1fr));gap:16px;">

            {{-- EasyPaisa --}}
            <div class="pay-card">
                <div style="font-size:30px;margin-bottom:10px;">🟢</div>
                <div style="font-size:15px;font-weight:500;color:#fff;margin-bottom:6px;">EasyPaisa</div>
                <div style="font-size:13px;color:#9F9F9F;line-height:1.8;">
                    Number: <span style="color:#6EC1E4;font-weight:500;">0316-2432749</span><br>
                    Name: <span style="color:#fff;">Muhammad Asad</span>
                </div>
                <button class="copy-btn" onclick="cp(this,'03162432749')">Copy Number</button>
            </div>

            {{-- NayaPay --}}
            <div class="pay-card">
                <div style="font-size:30px;margin-bottom:10px;">🟣</div>
                <div style="font-size:15px;font-weight:500;color:#fff;margin-bottom:6px;">NayaPay</div>
                <div style="font-size:13px;color:#9F9F9F;line-height:1.8;">
                    Number: <span style="color:#6EC1E4;font-weight:500;">0316-2432749</span><br>
                    Name: <span style="color:#fff;">Muhammad Asad</span>
                </div>
                <button class="copy-btn" onclick="cp(this,'03162432749')">Copy Number</button>
            </div>

            {{-- Faysal Bank --}}
            <div class="pay-card">
                <div style="font-size:30px;margin-bottom:10px;">🏦</div>
                <div style="font-size:15px;font-weight:500;color:#fff;margin-bottom:6px;">Faysal Bank</div>
                <div style="font-size:13px;color:#9F9F9F;line-height:1.8;">
                    Name: <span style="color:#fff;">Muhammad Asad</span><br>
                    IBAN: <span style="color:#6EC1E4;font-weight:500;word-break:break-all;">PK71FAYS3490383000003533</span><br>
                    Branch: <span style="color:#fff;">IBB Pak Colony, Karachi</span>
                </div>
                <button class="copy-btn" onclick="cp(this,'PK71FAYS3490383000003533')">Copy IBAN</button>
            </div>

        </div>

        <div style="margin-top:20px;font-size:13px;color:#9F9F9F;background:rgba(110,193,228,.05);border:1px solid rgba(110,193,228,.1);border-radius:5px;padding:12px 16px;line-height:1.8;">
            ⚠️ <strong style="color:#6EC1E4;">Important:</strong> Payment ke baad apna order detail aur payment screenshot
            <a href="{{ route('contact') }}" style="color:#6EC1E4;text-decoration:none;">Contact Form</a> ya
            <a href="https://wa.me/923162432749" target="_blank" style="color:#61CE70;text-decoration:none;">WhatsApp</a>
            pe zaroor bhejo. Confirm hote hi kaam shuru kar diya jaega.
        </div>
    </div>

</div>
</section>

@push('scripts')
<script>
const D={
    g1:{
        basic:   {p:'Rs 5,000', l:'Simple CRUD · 5 din delivery · 1 revision',      f:['Laravel setup & config','1 module (CRUD)','MySQL database','Basic Blade UI','!Authentication system','!Admin panel']},
        standard:{p:'Rs 10,000',l:'Multi-module app · 8 din delivery · 2 revisions', f:['Laravel setup & config','3 modules (CRUD)','MySQL + migrations','Authentication system','Tailwind CSS UI','!Admin panel']},
        premium: {p:'Rs 20,000',l:'Full app + admin · 12 din delivery · Unlimited',  f:['Full project setup','Unlimited modules','Authentication system','Admin panel (Filament)','Tailwind CSS UI','Deployment support']},
    },
    g2:{
        basic:   {p:'Rs 1,500', l:'200 rows tak · 5 din delivery · 1 revision',      f:['200 rows tak','Data cleaning','Basic formatting','!Formulas & functions','!Charts & pivot tables','!Automated reports']},
        standard:{p:'Rs 3,000', l:'1000 rows tak · 8 din delivery · 2 revisions',    f:['1000 rows tak','Data cleaning','Formulas & functions','Charts & pivot tables','!Automated reports','!Macro / VBA']},
        premium: {p:'Rs 6,000', l:'Unlimited rows · 12 din delivery · Unlimited',    f:['Unlimited rows','Full data cleaning','Advanced formulas','Charts & pivot tables','Automated reports','Custom dashboard']},
    },
    g3:{
        basic:   {p:'Rs 2,000', l:'2 min video · 5 din delivery · 1 revision',       f:['2 min tak video','Basic cuts & transitions','Background music','!Motion graphics','!Color grading','!Custom intro/outro']},
        standard:{p:'Rs 4,500', l:'5 min video · 8 din delivery · 2 revisions',      f:['5 min tak video','Cuts & transitions','Background music','Motion graphics','Color grading','!Custom intro/outro']},
        premium: {p:'Rs 9,000', l:'15 min video · 12 din delivery · Unlimited',      f:['15 min tak video','Professional editing','Motion graphics','Color grading','Custom intro/outro','Social media export']},
    },
    g4:{
        basic:   {p:'Rs 2,000', l:'Minor fixes · 5 din delivery · 1 revision',       f:['Content updates','Plugin installation','Minor bug fixes','!Theme customization','!Speed optimization','!WooCommerce setup']},
        standard:{p:'Rs 5,000', l:'Full management · 8 din delivery · 2 revisions',  f:['Content updates','Plugin management','Theme customization','Speed optimization','!WooCommerce setup','!Monthly maintenance']},
        premium: {p:'Rs 10,000',l:'Complete setup · 12 din delivery · Unlimited',    f:['Full WordPress setup','Theme customization','WooCommerce setup','Speed optimization','SEO basics','Monthly maintenance']},
    },
};

let currentOrder = {};

function sw(tab, gig, pkg) {
    tab.parentElement.querySelectorAll('.pkg-tab').forEach(t => {
        t.classList.remove('pkg-tab-active');
        t.style.background = 'transparent';
        t.style.color = '#9F9F9F';
    });
    tab.classList.add('pkg-tab-active');
    tab.style.background = '#6EC1E4';
    tab.style.color = '#0D0D0D';

    const d = D[gig][pkg];
    document.getElementById(gig+'-price').textContent = d.p;
    document.getElementById(gig+'-label').textContent = d.l;

    const ul = document.getElementById(gig+'-feats');
    ul.innerHTML = d.f.map(f => {
        if(f.startsWith('!')) {
            return `<li class="feat-no" style="font-size:11px;color:rgba(255,255,255,.25);display:flex;align-items:center;gap:5px;"><span style="font-size:10px;">✕</span>${f.slice(1)}</li>`;
        }
        return `<li style="font-size:11px;color:#9F9F9F;display:flex;align-items:center;gap:5px;"><span style="color:#61CE70;font-size:10px;">✓</span>${f}</li>`;
    }).join('');

    const btn = document.getElementById(gig+'-btn');
    btn.textContent = `Order Now (${d.p})`;

    const deliveryDays = {basic:'5 din delivery', standard:'8 din delivery', premium:'12 din delivery'};
    const badge = document.getElementById(gig+'-badge');
    if(badge) badge.textContent = deliveryDays[pkg];

    const gigNames = {g1:'Laravel Development',g2:'Data Entry & Excel',g3:'Video Editing',g4:'WordPress Management'};
    const pkgCap = pkg.charAt(0).toUpperCase()+pkg.slice(1);
    btn.setAttribute('onclick', `orderNow('${gigNames[gig]}','${pkgCap}','${d.p}')`);
}

function orderNow(service, pkg, price) {
    document.getElementById('modal-title').textContent = service + ' — ' + pkg;
    document.getElementById('modal-sub').textContent = 'Price: ' + price;
    const m = document.getElementById('order-modal');
    m.style.display = 'flex';
}

function closeModal() {
    document.getElementById('order-modal').style.display = 'none';
}

function cp(btn, txt) {
    navigator.clipboard.writeText(txt).catch(()=>{});
    const orig = btn.textContent;
    btn.textContent = 'Copied!';
    btn.style.color = '#61CE70';
    btn.style.borderColor = '#61CE70';
    setTimeout(()=>{
        btn.textContent = orig;
        btn.style.color = '#6EC1E4';
        btn.style.borderColor = 'rgba(110,193,228,.35)';
    }, 1800);
}

document.getElementById('order-modal').addEventListener('click', function(e){
    if(e.target === this) closeModal();
});
</script>
@endpush

@endsection
