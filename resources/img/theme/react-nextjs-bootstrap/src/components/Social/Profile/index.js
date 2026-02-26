"use client";

import { Card } from "react-bootstrap";
import Image from "next/image";

const Profile = () => {
  return (
    <>
      <div className="position-relative">
        <Image
          src="/images/profile-bg.jpg"
          className="rounded-top-3"
          alt="profile-bg"
          width={1680}
          height={360}
        />

        <div
          className="position-absolute"
          style={{ bottom: "25px", right: "25px" }}
        >
          <button
            type="button"
            className="btn btn-outline-light text-white hover rounded-2"
          >
            Update Cover Photo
          </button>
        </div>
      </div>

      <Card className="bg-white border-0 rounded-3 mb-4 rounded-top-0">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between flex-wrap gap-3">
            <div className="d-flex align-items-end">
              <div className="flex-shrink-0 position-relative mt-minus-110">
                <Image
                  src="/images/user-68.jpg"
                  className="rounded-circle border border-2 wh-160"
                  alt="user"
                  width={160}
                  height={160}
                />
                <Image
                  src="/images/check.svg"
                  className="position-absolute bottom-0 end-0"
                  alt="check"
                  width={50}
                  height={50}
                />
              </div>

              <div className="flex-grow-1 ms-3">
                <h4 className="fs-24 mb-1">Alice Johnson</h4>
                <span className="fs-15 fw-medium">Product designer</span>
              </div>
            </div>

            <div className="d-flex align-items-center">
              <button
                button="button"
                className="btn btn-outline-light text-body fw-medium fs-16 px-4 hover hover-bg"
              >
                <i className="ri-edit-line fw-medium fs-18 me-1"></i>
                <span>Edit</span>
              </button>

              <button
                button="button"
                className="btn btn-primary fw-medium fs-16 px-4 ms-3"
              >
                <i className="ri-share-fill fw-medium fs-18 me-1"></i>
                <span>Share</span>
              </button>
            </div>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default Profile;
