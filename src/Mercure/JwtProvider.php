<?php

namespace App\Mercure;

use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Signer\Key;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\Signer\Key\InMemory;


/**
 * Summary of MyCustomTokenBuilder
 */
class MyCustomTokenBuilder implements Builder
{
	function permittedFor(string ...$audiences): Builder
	{
	}
	function expiresAt(\DateTimeImmutable $expiration): Builder
	{
	}
	function identifiedBy(string $id): Builder
	{
	}
	function issuedAt(\DateTimeImmutable $issuedAt): Builder
	{
	}
	function issuedBy(string $issuer): Builder
	{
	}
	function canOnlyBeUsedAfter(\DateTimeImmutable $notBefore): Builder
	{
	}
	function relatedTo(string $subject): Builder
	{
	}
	function withHeader(string $name, mixed $value): Builder
	{
	}
	function withClaim(string $name, mixed $value): Builder
	{
	}
	function getToken(\Lcobucci\JWT\Signer $signer, Key $key): \Lcobucci\JWT\UnencryptedToken
	{
	}
}


class JwtProvider
{
	private string $secret;

	public function __construct(string $secret)
	{
		$this->secret = $secret;
	}

	public function __invoke(): string
	{
		return (new MyCustomTokenBuilder())
			->withClaim('mercure', ['publish' => ['*']])
			->getToken(new Sha256(), InMemory::plainText($this->secret))->toString();;
	}
}
