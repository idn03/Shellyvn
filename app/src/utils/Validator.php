<?php

function isHarassment($value) {
	$inValidInput = ['add', 'edit', 'delete', 'contact', 'subject', 'employees', 'home', 'login', 'logout'];
	return in_array($value, $inValidInput);
}

// validate required
function isRequired($value) {
	return !empty($value);
}

// validate email
function isEmail($value) {
	if (!isset($value)) {
		return false;
	}
	return preg_match('/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $value);
}

// validate phone number
function isPhoneNumber($value) {
	if (!isset($value)) {
		return false;
	}
	return preg_match('/((09|03|07|08|05|01)+([0-9]{8})\b)/', $value);
}

// validate date
function isDate($value) {
	if (!isset($value)) {
		return false;
	}
	$curentDate = new DateTime();
	$date = new DateTime($value);
	return $date >= $curentDate;
}

// validate password
function isPassword($value) {
	if (!isset($value)) {
		return false;
	}
	return strlen($value) >= 6;
}
// validate string
function isString($value) {
	if (!isset($value)) {
		return false;
	}
	return is_string($value);
}
// validate number
function isNumber($value) {
	if (!isset($value)) {
		return false;
	}
	return is_numeric($value);
}

// validate max length
function isMaxLength($value, $maxLength) {
	if (!isset($value)) {
		return false;
	}
	return strlen($value) <= $maxLength;
}
// validate min length
function isMinLength($value, $minLength) {
	if (!isset($value)) {
		return false;
	}
	return strlen($value) >= $minLength;
}
// validate score from 0 -> 10
function isScore($value) {
	if (!isset($value)) {
		return false;
	}
	return $value >= 0 && $value <= 10;
}

function isBeforeToday($value) {
	if (!isset($value)) {
		return false;
	}
	$curentDate = new DateTime();
	$date = new DateTime($value);
	return $date < $curentDate;
}

function validate(array $data, array $rules): array|bool {
	$errors = [];
	foreach ($rules as $key => $rule) {
		foreach ($rule as $r => $message) {
			if ($r === 'isRequired' && !isRequired($data[$key])) {
				$errors[$key] = $message;
			}
			if ($r === 'isEmail' && !isEmail($data[$key])) {
				$errors[$key] = $message;
			}
			if ($r === 'isPhoneNumber' && !isPhoneNumber($data[$key])) {
				$errors[$key] = $message;
			}
			if ($r === 'isDate' && !isDate($data[$key])) {
				$errors[$key] = $message;
			}
			if ($r === 'isPassword' && !isPassword($data[$key])) {
				$errors[$key] = $message;
			}
			if ($r === 'isString' && !isString($data[$key])) {
				$errors[$key] = $message;
			}
			if ($r === 'isNumber' && !isNumber($data[$key])) {
				$errors[$key] = $message;
			}
			if (str_starts_with($r, 'maxLength')) {
				$maxLength = (int)explode(':', $r)[1];
				if (!isMaxLength($data[$key], $maxLength)) {
					$errors[$key] = $message;
				}
			}
			if (str_starts_with($r, 'minLength')) {
				$minLength = (int)explode(':', $r)[1];
				if (!isMinLength($data[$key], $minLength)) {
					$errors[$key] = $message;
				}
			}
			if ($r === 'isScore' && !isScore($data[$key])) {
				$errors[$key] = $message;
			}

			if ($r === 'isBeforeToday' && !isBeforeToday($data[$key])) {
				$errors[$key] = $message;
			}
		}
	}
	return count($errors) > 0 ? $errors : false;
}