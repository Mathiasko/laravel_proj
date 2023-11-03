import { Link, Head } from "@inertiajs/react";
import img1 from "../../img/img1.jpg";

export default function Welcome({ auth, laravelVersion, phpVersion }) {
    return (
        <>
            <Head title="Welcome" />
            <div class="box">
                <h2>volake veci</h2>
                <h4 class="">blah</h4>
                <div className="flex flex-col bg-slate-600">
                    <a href="/">HOME</a>
                    <a href="/old">old HOME</a>
                    <a href="/abc">Enter!</a>
                    <a href="/counter">counter</a>
                    <a href="/todo">ToDo</a>
                </div>
                <h2>react home</h2>
                <img src={img1} alt="imag" />
            </div>
        </>
    );
}
