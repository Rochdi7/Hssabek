"use client";

import { Dropdown, Card } from "react-bootstrap";
import Image from "next/image";

const Profile = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center mb-4">
            <div className="d-flex align-items-center">
              <div className="flex-shrink-0">
                <Image
                  src="/images/seller-1.png"
                  className="wh-52"
                  alt="seller"
                  width={52}
                  height={52}
                />
              </div>
              <div className="flex-grow-1 ms-3">
                <div className="text-decoration-none text-secondary fw-medium fs-16 mb-1">
                  Ava Turner
                </div>
                <span className="d-block">turner@trezo.com</span>
              </div>
            </div>

            <Dropdown className="action-opt ms-2 position-relative top-3">
              <Dropdown.Toggle
                variant="secondary"
                id="dropdown-basic"
                className="bg-transparent p-0"
              >
                <span className="material-symbols-outlined">more_horiz</span>
              </Dropdown.Toggle>

              <Dropdown.Menu className="bg-white border box-shadow">
                <Dropdown.Item href="#">
                  <i className="material-symbols-outlined">visibility</i>
                  View
                </Dropdown.Item>

                <Dropdown.Item href="#">
                  <span className="material-symbols-outlined">edit</span>
                  Edit
                </Dropdown.Item>

                <Dropdown.Item href="#">
                  <i className="material-symbols-outlined">delete</i>
                  Delete
                </Dropdown.Item>
              </Dropdown.Menu>
            </Dropdown>
          </div>

          <div className="d-flex align-items-center mb-3">
            <span>Last Sale Date:</span>
            <span className="text-secondary ms-1">20 Jan 2024</span>
          </div>
          <div className="d-flex align-items-center mb-3">
            <span>Item Stock:</span>
            <span className="text-secondary ms-1">99</span>
          </div>
          <div className="d-flex align-items-center mb-3">
            <span>Wallet Balance:</span>
            <span className="text-secondary ms-1">$3,699.50</span>
          </div>
          <div className="d-flex align-items-center mb-3">
            <span>Revenue:</span>
            <span className="text-secondary ms-1">$2,599.50</span>
          </div>
          <div className="d-flex align-items-center mb-3">
            <span>Store:</span>
            <span className="text-secondary ms-1">Barbahall Store</span>
          </div>

          <h4 className="fw-medium fs-15 mb-2">Contact Support</h4>
          <form>
            <textarea
              rows="5"
              className="form-control"
              placeholder="Type here"
            ></textarea>

            <button
              type="submit"
              className="btn btn-primary fw-medium fs-16 py-2 px-4 mt-3"
            >
              <div className="d-flex align-items-center">
                <span className="material-symbols-outlined fs-20 me-2 text-white">
                  send
                </span>

                <span className="py-1 d-inline-block text-white">
                  Submit Now
                </span>
              </div>
            </button>
          </form>
        </Card.Body>
      </Card>
    </>
  );
};

export default Profile;
