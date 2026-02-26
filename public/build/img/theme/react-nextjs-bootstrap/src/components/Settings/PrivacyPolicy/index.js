"use client";

const PrivacyPolicy = () => {
  return (
    <>
      <h4 className="fs-18 mb-4">Security :</h4>

      <ul className="ps-0 mb-0 list-unstyled">
        <li className="mb-4">
          <h4 className="fw-semibold fs-14">Two-factor Authentication</h4>
          <p>
            Lorem Ipsum is simply dummy text of the printing and typesetting
            industry. Lorem Ipsum has been the industry`&apos;s standard dummy
            text ever since the 1500s, when an unknown printer took a galley of.
          </p>
        </li>

        <li className="mb-4">
          <h4 className="fw-semibold fs-14">Secondary Verification</h4>
          <p>
            It has survived not only five centuries, but also the leap into
            electronic typesetting, remaining essentially unchanged. It was
            popularised in the 1960s with the release of Letraset sheets
            containing.
          </p>
        </li>

        <li className="mb-4">
          <h4 className="fw-semibold fs-14">Backup Codes</h4>
          <p>
            Lorem Ipsum passages, and more recently with desktop publishing
            software like Aldus PageMaker including versions of lorem ipsum.
          </p>
        </li>

        <li className="mb-4">
          <h4 className="fw-semibold fs-14">
            Desktop, Email, Chat, Purchase Notifications
          </h4>
          <p>
            It is a long established fact that a reader will be distracted by
            the readable content of a page when looking at its layout. The point
            of using Lorem Ipsum is that it has a more-or-less normal
            distribution of letters.
          </p>
        </li>

        <li className="mb-4">
          <h4 className="fw-semibold fs-14">Delete This Account :</h4>
          <p>
            There are many variations of passages of Lorem Ipsum available, but
            the majority have suffered alteration in some form, by injected
            humour, or randomised words which do not look even slightly
            believable.
          </p>
        </li>

        <li className="d-flex gap-3">
          <button className="btn btn-danger fw-semibold text-white bg-danger border-0 py-2 px-4">
            Cancel
          </button>
          <button className="btn btn-primary fw-semibold text-white bg-primary border-0 py-2 px-4">
            Close & Delete This Account
          </button>
        </li>
      </ul>
    </>
  );
};

export default PrivacyPolicy;
