import { Link, Head } from '@inertiajs/react';
import {useEffect, useState} from "react";

export default function Welcome({ auth, laravelVersion, phpVersion }) {

    const [acContent, setacContent] = useState('');

    useEffect(() => {
        fetch('/accueil')
            .then((response) => response.json())
            .then((data) => {
                setacContent(data.content);
            });
    }, []);


    return (
        <>
            <Head title="Welcome"/>
            <div
                className="relative sm:flex sm:justify-center sm:items-center bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter  selection:bg-red-500 selection:text-white">
                <div className="sm:fixed sm:top-0 sm:right-0 p-6 text-end">
                    {auth.user ? (
                        <Link
                            href={route('dashboard')}
                            className="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                        >
                            Home
                        </Link>
                    ) : (
                        <>
                            <Link
                                href={route('login')}
                                className="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                            >
                                Log in
                            </Link>

                            <Link
                                href={route('register')}
                                className="ms-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                            >
                                Register
                            </Link>
                        </>
                    )}
                </div>


            </div>
            <div className="max-w-7xl mx-auto p-6 lg:p-8">

                <div dangerouslySetInnerHTML={{__html: acContent}}/>
            </div>

        </>
    );
}
