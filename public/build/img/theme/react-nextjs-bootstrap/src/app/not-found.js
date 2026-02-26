import Link from "next/link";
import Image from "next/image";

export default function NotFound() {
  return (
    <>
      <div className="m-auto py-5 text-center">
        <Image
          src="/images/error.png"
          className="mb-4"
          alt="error"
          width={400}
          height={400}
        />

        <h3 className="fs-24 mb-3">
          Looks like we did not find this page, please try again later.
        </h3>

        <p className="mb-4">
          But no worries! Our team is looking ever where while you wait safely.
        </p>

        <Link href="/" className="btn btn-primary py-2 px-4 fs-16 fw-medium">
          <span className="d-inline-block py-1">Back To Home</span>
        </Link>
      </div>
    </>
  );
}
