<?php

namespace v1;

class Hello
{

    /**
     *
     * @url GET /hi/{text}
     *
     * @return array
     * @throws RestException
     */
    public function hi(string $text): string
    {
        return 'Hello ' . $text;
    }
}
