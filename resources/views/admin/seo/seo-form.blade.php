<div class="panel">
    <div class="panel-heading">
        <span class="panel-title">SEO Data</span>
    </div>

    <div class="panel-body">

        {{-- Meta Title --}}
        <div class="form-group">
            <label class="col-lg-3 control-label">Meta Title</label>
            <div class="col-lg-8">
                <input type="text" name="seo[meta_title]" class="form-control"
                    value="{{ old('seo.meta_title', $seo->meta_title ?? '') }}">
            </div>
        </div>

        {{-- Meta Description --}}
        <div class="form-group">
            <label class="col-lg-3 control-label">Meta Description</label>
            <div class="col-lg-8">
                <textarea name="seo[meta_description]" class="form-control" rows="3">{{ old('seo.meta_description', $seo->meta_description ?? '') }}</textarea>
            </div>
        </div>

        {{-- OG Title --}}
        <div class="form-group">
            <label class="col-lg-3 control-label">OG Title</label>
            <div class="col-lg-8">
                <input type="text" name="seo[og_title]" class="form-control"
                    value="{{ old('seo.og_title', $seo->og_title ?? '') }}">
            </div>
        </div>

        {{-- OG Description --}}
        <div class="form-group">
            <label class="col-lg-3 control-label">OG Description</label>
            <div class="col-lg-8">
                <textarea name="seo[og_description]" class="form-control">{{ old('seo.og_description', $seo->og_description ?? '') }}</textarea>
            </div>
        </div>

        {{-- OG Image --}}
        <div class="form-group">
            <label class="col-lg-3 control-label">OG Image</label>
            <div class="col-lg-8">
                <input type="file" name="seo_og_image" class="form-control">

                @if(isset($seo) && $seo->og_image)
                    <div class="mt-2">
                        <img src="{{ asset('uploads/seo/'.$seo->og_image) }}" width="120">
                    </div>
                @endif
            </div>
        </div>

        {{-- OG Image Alt --}}
        <div class="form-group">
            <label class="col-lg-3 control-label">OG Image Alt</label>
            <div class="col-lg-8">
                <input type="text" name="seo[og_image_alt]" class="form-control"
                    value="{{ old('seo.og_image_alt', $seo->og_image_alt ?? '') }}">
            </div>
        </div>

        {{-- Canonical URL --}}
        <div class="form-group">
            <label class="col-lg-3 control-label">Canonical URL</label>
            <div class="col-lg-8">
                <input type="text" name="seo[canonical_url]" class="form-control"
                    value="{{ old('seo.canonical_url', $seo->canonical_url ?? '') }}">
            </div>
        </div>

        {{-- Robots --}}
        @php
            $robots = old('seo.robots', $seo->robots ?? 'index,follow');
            $robotsArray = explode(',', $robots);
        @endphp

        <div class="form-group">
            <label class="col-lg-3 control-label">Robots</label>
            <div class="col-lg-8">

                <label>
                    <input type="checkbox" name="seo[index]" value="1"
                        {{ in_array('index', $robotsArray) ? 'checked' : '' }}>
                    Index
                </label>

                <label style="margin-left:15px;">
                    <input type="checkbox" name="seo[follow]" value="1"
                        {{ in_array('follow', $robotsArray) ? 'checked' : '' }}>
                    Follow
                </label>

            </div>
        </div>

        {{-- Schema Type --}}
        @php
            $schemaType = old('seo.schema_type', $seo->schema_type ?? '');
        @endphp

        <div class="form-group">
            <label class="col-lg-3 control-label">Schema Type</label>

            <div class="col-lg-8">
                <select name="seo[schema_type]" class="form-control">

                    <option value="" disabled {{ empty($schemaType) ? 'selected' : '' }}>
                        Select Type
                    </option>

                    <option value="article" {{ $schemaType === 'article' ? 'selected' : '' }}>
                        Article
                    </option>

                    <option value="product" {{ $schemaType === 'product' ? 'selected' : '' }}>
                        Product
                    </option>

                    <option value="faq_page" {{ $schemaType === 'faq_page' ? 'selected' : '' }}>
                        FAQ Page
                    </option>

                    <option value="web_page" {{ $schemaType === 'web_page' ? 'selected' : '' }}>
                        Web Page
                    </option>

                </select>
            </div>
        </div>

        {{-- Schema Data --}}
        <div class="form-group">
            <label class="col-lg-3 control-label">Schema Data (JSON)</label>

            <div class="col-lg-8">

                {{-- Textarea --}}
                <textarea name="seo[schema_data]" class="form-control" rows="6"
                    placeholder='{
                    "@context": "https://schema.org",
                    "@type": "Article",
                    "headline": "Your title here"
                    }'>{{ old('seo.schema_data', isset($seo->schema_data) ? json_encode($seo->schema_data, JSON_PRETTY_PRINT) : '') }}</textarea>

                {{-- Helper text --}}
                <small class="text-muted">
                    Enter valid JSON-LD schema. This helps search engines understand your content.
                </small>

                {{-- Example --}}
                <pre class="mt-2" style="background:#f8f9fa; padding:10px; border-radius:5px;">
                {
                    "@context": "https://schema.org",
                    "@type": "Article",
                    "headline": "Your title here",
                    "author": {
                        "@type": "Person",
                        "name": "Admin"
                    },
                    "...": "....",
                }
                </pre>

            </div>
        </div>

        <!-- Focus Keyword -->
        <div class="form-group">
            <label class="col-lg-3 control-label">Focus Keyword</label>
            <div class="col-lg-8">
                <input type="text" name="seo[focus_keyword]" class="form-control"
                    value="{{ old('seo.focus_keyword', $seo->focus_keyword ?? '') }}">
            </div>
        </div>

        {{-- Sitemap --}}
        <div class="form-group">
            <label class="col-lg-3 control-label">Include in Sitemap</label>
            <div class="col-lg-8">
                <select name="seo[in_sitemap]" class="form-control">
                    <option value="1" {{ (old('seo.in_sitemap', $seo->in_sitemap ?? 1) == 1) ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ (old('seo.in_sitemap', $seo->in_sitemap ?? 1) == 0) ? 'selected' : '' }}>No</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3 control-label">Priority</label>
            <div class="col-lg-8">
                <input type="number" step="0.1" min="0" max="1"
                    name="seo[sitemap_priority]" class="form-control"
                    value="{{ old('seo.sitemap_priority', $seo->sitemap_priority ?? 0.5) }}">
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3 control-label">Change Frequency</label>
            <div class="col-lg-8">
                <select name="seo[change_frequency]" class="form-control">
                    <option value="daily">Daily</option>
                    <option value="weekly">Weekly</option>
                    <option value="monthly">Monthly</option>
                </select>
            </div>
        </div>

    </div>
</div>
