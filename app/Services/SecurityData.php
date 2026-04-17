<?php

namespace App\Services;
class SecurityData

{
	public static string $MerchantId = "9103336467";
     /**
     * JWE Key Id.
     *
     * @var string
     */
    public static string $EncryptionKeyId = "19f84b5655f04e25a99b09f1ee2fac78";

    /**
     * Access Token.
     *
     * @var string
     */
    public static string $AccessToken = "bc1864199c35420587b8134a463eb117";

    /**
     * Token Type - Used in JWS and JWE header.
     *
     * @var string
     */
    public static string $TokenType = "JWT";

    /**
     * JWS (JSON Web Signature) Signature Algorithm - This parameter identifies the cryptographic algorithm used to
     * secure the JWS.
     *
     * @var string
     */
    public static string $JWSAlgorithm = "PS256";

    /**
     * JWE (JSON Web Encryption) Key Encryption Algorithm - This parameter identifies the cryptographic algorithm
     * used to secure the JWE.
     *
     * @var string
     */
    public static string $JWEAlgorithm = "RSA-OAEP";

    /**
     * JWE (JSON Web Encryption) Content Encryption Algorithm - This parameter identifies the content encryption
     * algorithm used on the plaintext to produce the encrypted ciphertext.
     *
     * @var string
     */
    public static string $JWEEncrptionAlgorithm = "A128CBC-HS256";

    /**
     * Merchant Signing Private Key is used to cryptographically sign and create the request JWS.
     *
     * @var string
     */
    public static string $MerchantSigningPrivateKey = "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";
    /**
     * PACO Encryption Public Key is used to cryptographically encrypt and create the request JWE.
     *
     * @var string
     */
    public static string $PacoEncryptionPublicKey = "MIICIjANBgkqhkiG9w0BAQEFAAOCAg8AMIICCgKCAgEA6ZLups2K0iYEMxQqgASX8gY6tWhNVCp08YuDgjCsOVrGVgUHD0dh0TWFNJ7Lq2Jp0SOsGgi54+hrjwPOL2CCZxw8pKUlL57UksoD9oWUrK/KkSvEAwPU4cZqzxIXyhBcZb8O96iN4WQJILkRTg+DXLkML6qisO496fPGIs+vCoc87toucy5O9fRfaYSjcqjreyi8JDkvVJM/BeNtOEM2a0b/lcWa67RH+tN97H25k+Qez7QthLru6oBfWBgD6iIwhV+ICqLWHmp6fQ+DHQk/o+OO3yFiY9OAvMiy8MOTinvkBlFwYgYNznG3/w0Xh8U5vtudUXPDNUO6ddf4y99+6LlWDiKgJn/Th93YUg+gFH4LUJHyPrSY2JuC+Q8kksp2xyiZDTHGzi96kturwrqCui6TytCHcU4UB0VRMR+M7VRl3S2YPhcxv5U8Fh2PITqydZE5vv1Va06qhegjOlSZnEUl2xKPm5k/u+UHvUP/oq04fQLTlYqyA3JYDCe4z5Ea2SOgjeVl+qTatWYzmkUXyCONLZ4UaRrgbYCp0nCPHoTFgRQdChu8ezDbnYY9IW7cT/s2fEi5N7X1XrQttiEP4rbn0y0qVYYjN86+elfhtYGHidZTUSUS5RSTHqOkj59p5LIGwFF9iTXzCjfUqq8clnfOk76qSLY1+Kj+SMMe6Z8CAwEAAQ==";
    /**
     * PACO Signing Public Key is used to cryptographically verify the response JWS signature.
     *
     * @var string
     */
    public static string $PacoSigningPublicKey = "MIICIjANBgkqhkiG9w0BAQEFAAOCAg8AMIICCgKCAgEAr0XW6QacR8GilY4nZrJZW40wnFeYu7h9aXUSqxCP6djurCWZmLqnrsYWP7/HR8WOulYPHTVpfqJesTOdVqPgY6p10H811oRbJG9jvsG8j8kn/Bk8b2wZ9qelNqdNJMDbR5WUyaytaDWW6QdI4+clqjFfwCOw76noDSe+R4pDSzgMiyCk5R4m2ECT1fv/4Axz2bvLN+DRTg5DPPIMLWpA87lgjxeaDlGyJqZCbkJozW7JX0AJVc0X7YR9kzbiTi3LVOInSKY+VHT8yCARIdvXtKc6+IWSbVQqgpNIBB8GN0OvU8xedjPNCMGZnnMtgd7XLTf/okyadbdNLAqQLTbDs/5HnIVx8FyfgiOS/zsim5ivi3ljVAW3T3ePGjkY0q1DMzr5iJ4m/WTL2d1TArlfHyQhkSpFpQPOO+pJyVQqttHJo99vMirQogdSx4lIu//aod0yJyJLpjCeiqb2Fz3Qk0AZ4S78QKeeGsxTRchTP6Wsb6okaZd+cFi6z8qbP0z/Y3xRZO7vOLB/whkqS+pMVKBQ42YzgQPRzbXXmgCkf1nCqgrD9bnIB5ovdRGfDXW86GKY8XwGVjb4BoMvql+HsbonKHAO+eGfQulpB5YfQGQU3ZXdMdfCLAk8FuqemH4k7S7diLzVvRCuisHsEx6qJ4ewxzNCvW7OGVinTR9NSQUCAwEAAQ==";
    /**
     * Merchant Decryption Private Key used to cryptographically decrypt the response JWE.
     * @var string
     */
    public static string $MerchantDecryptionPrivateKey = "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";
}