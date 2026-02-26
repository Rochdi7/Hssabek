"use client";

import { Row, Col, Form } from "react-bootstrap";
import Image from "next/image";

const AccountSettings = () => {
  return (
    <>
      <div className="mb-4">
        <h4 className="fs-20 mb-1">Profile</h4>
        <p className="fs-15">Update your photo and personal details here.</p>
      </div>

      <Form>
        <Row>
          <Col lg={6}>
            <Form.Group className="mb-4">
              <label className="label text-secondary">First Name</label>
              <Form.Group className="position-relative">
                <Form.Control
                  type="text"
                  className="text-dark ps-5 h-55"
                  defaultValue="Olivia"
                />
                <i className="ri-user-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
              </Form.Group>
            </Form.Group>
          </Col>

          <Col lg={6}>
            <Form.Group className="mb-4">
              <label className="label text-secondary">Last Name</label>
              <Form.Group className="position-relative">
                <Form.Control
                  type="text"
                  className="text-dark ps-5 h-55"
                  defaultValue="John"
                />
                <i className="ri-user-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
              </Form.Group>
            </Form.Group>
          </Col>

          <Col lg={6}>
            <Form.Group className="mb-4">
              <label className="label text-secondary">Email Address</label>
              <Form.Group className="position-relative">
                <Form.Control
                  type="email"
                  className="text-dark ps-5 h-55"
                  defaultValue="olivia@trezo.com"
                />
                <i className="ri-mail-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
              </Form.Group>
            </Form.Group>
          </Col>

          <Col lg={6}>
            <Form.Group className="mb-4">
              <label className="label text-secondary">Phone</label>
              <Form.Group className="position-relative">
                <Form.Control
                  type="text"
                  className="text-dark ps-5 h-55"
                  defaultValue="+1 444 555 6699"
                />
                <i className="ri-phone-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
              </Form.Group>
            </Form.Group>
          </Col>

          <Col lg={6}>
            <Form.Group className="mb-4">
              <label className="label text-secondary">Address</label>
              <Form.Group className="position-relative">
                <Form.Control
                  type="text"
                  className="text-dark ps-5 h-55"
                  defaultValue="E.g. 84 S. Arrowhead Court Branford"
                />
                <i className="ri-phone-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
              </Form.Group>
            </Form.Group>
          </Col>

          <Col lg={6}>
            <Form.Group className="mb-4">
              <label className="label text-secondary">Country</label>
              <Form.Group className="position-relative">
                <Form.Select
                  className="form-control ps-5 h-55"
                  aria-label="Default select example"
                >
                  <option value="0" className="text-dark">
                    Switzerland
                  </option>
                  <option value="1" className="text-dark">
                    United States
                  </option>
                  <option value="2" className="text-dark">
                    Canada
                  </option>
                  <option value="3" className="text-dark">
                    France
                  </option>
                </Form.Select>
                <i className="ri-map-2-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
              </Form.Group>
            </Form.Group>
          </Col>

          <Col lg={6}>
            <Form.Group className="mb-4">
              <label className="label text-secondary">Date Of Birth</label>
              <Form.Group className="position-relative">
                <Form.Control
                  type="date"
                  className="text-dark ps-5 h-55 text-gray-light"
                />
                <i className="ri-calendar-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
              </Form.Group>
            </Form.Group>
          </Col>

          <Col lg={6}>
            <Form.Group className="mb-4">
              <label className="label text-secondary">Gender</label>
              <Form.Group className="position-relative">
                <Form.Select
                  className="form-control ps-5 h-55"
                  aria-label="Default select example"
                >
                  <option value="0" className="text-dark">
                    Male
                  </option>
                  <option value="1" className="text-dark">
                    Female
                  </option>
                  <option value="2" className="text-dark">
                    Others
                  </option>
                </Form.Select>
                <i className="ri-men-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
              </Form.Group>
            </Form.Group>
          </Col>

          <Col lg={6}>
            <Form.Group className="mb-4">
              <label className="label text-secondary">Your Skills</label>
              <Form.Group className="position-relative">
                <Form.Select
                  className="form-control ps-5 h-55"
                  aria-label="Default select example"
                >
                  <option value="0" className="text-dark">
                    Project Management
                  </option>
                  <option value="1" className="text-dark">
                    Leadership
                  </option>
                  <option value="2" className="text-dark">
                    Data Analysis
                  </option>
                  <option value="3" className="text-dark">
                    Teamwork
                  </option>
                  <option value="4" className="text-dark">
                    Web Development
                  </option>
                </Form.Select>
                <i className="ri-men-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
              </Form.Group>
            </Form.Group>
          </Col>

          <Col lg={6}>
            <Form.Group className="mb-4">
              <label className="label text-secondary">Your Profession</label>
              <Form.Group className="position-relative">
                <Form.Select
                  className="form-control ps-5 h-55"
                  aria-label="Default select example"
                >
                  <option value="0" className="text-dark">
                    Software Developer
                  </option>
                  <option value="1" className="text-dark">
                    Financial Manager
                  </option>
                  <option value="2" className="text-dark">
                    IT Manager
                  </option>
                  <option value="3" className="text-dark">
                    Teamwork
                  </option>
                  <option value="4" className="text-dark">
                    Physician Assistant
                  </option>
                </Form.Select>
                <i className="ri-men-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
              </Form.Group>
            </Form.Group>
          </Col>

          <Col lg={6}>
            <Form.Group className="mb-4">
              <label className="label text-secondary">Company Name</label>
              <Form.Group className="position-relative">
                <Form.Control
                  type="text"
                  className="text-dark ps-5 h-55"
                  defaultValue="Trezo Admin"
                />
                <i className="ri-phone-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
              </Form.Group>
            </Form.Group>
          </Col>

          <Col lg={6}>
            <Form.Group className="mb-4">
              <label className="label text-secondary">Company Website</label>
              <Form.Group className="position-relative">
                <Form.Control
                  type="url"
                  className="text-dark ps-5 h-55"
                  defaultValue="http://website.com"
                />
                <i className="ri-phone-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
              </Form.Group>
            </Form.Group>
          </Col>

          <Col lg={12}>
            <Form.Group className="mb-4">
              <label className="label text-secondary">Bio Data :</label>
              <Form.Group className="position-relative">
                <textarea
                  className="form-control ps-5 text-dark"
                  placeholder="Bio Data ... "
                  cols="30"
                  rows="5"
                ></textarea>
                <i className="ri-information-line position-absolute top-3 start-0 fs-20 text-gray-light ps-20 pt-2"></i>
              </Form.Group>
            </Form.Group>
          </Col>

          <Col lg={12}>
            <Form.Group className="mb-4 p-4 bg-body d-sm-flex justify-content-between align-items-center rounded-3">
              <div className="d-sm-flex align-items-center mb-3 mb-sm-0 me-lg-3">
                <div className="me-md-5 pe-xxl-5 mb-3 mb-sm-0">
                  <h4 className="body-font fs-15 fw-semibold text-body">
                    Your photo
                  </h4>
                  <p>This will be displayed on your profile.</p>
                </div>
                <Image
                  src="/images/user-70.png"
                  className="rounded-4 wh-75 ms-3 ms-lg-0 rounded-circle"
                  alt="user"
                  width={75}
                  height={75}
                />
              </div>

              <div className="d-flex ms-sm-3 ms-md-0">
                <button className="btn bg-danger bg-opacity-10 text-danger fw-semibold">
                  Delete
                </button>
                <button className="btn bg-primary bg-opacity-10 text-primary fw-semibold ms-3">
                  Update
                </button>
              </div>
            </Form.Group>
          </Col>

          <Col lg={12}>
            <Form.Group>
              <label className="label text-secondary">
                File Upload - Product Gallery
              </label>
              <div className="form-control h-100 text-center position-relative p-4 p-lg-5">
                <div className="product-upload">
                  <label htmlFor="file-upload" className="file-upload mb-0">
                    <i className="ri-folder-image-line bg-primary bg-opacity-10 p-2 rounded-1 text-primary"></i>
                    <span className="d-block text-body fs-14">
                      Drag and drop an image or{" "}
                      <span className="text-primary text-decoration-underline">
                        Browse
                      </span>
                    </span>
                  </label>
                  <input id="file-upload" type="file" />
                </div>
              </div>
            </Form.Group>
          </Col>
        </Row>

        <div className="mb-4 mt-5">
          <h4 className="fs-20 mb-4">Socials Profile</h4>
        </div>

        <Row>
          <Col lg={6}>
            <Form.Group className="mb-4">
              <label className="label text-secondary">Facebook</label>
              <Form.Group className="position-relative">
                <Form.Control
                  type="url"
                  className="text-dark ps-5 h-55"
                  defaultValue="https://www.facebook.com/"
                />
                <i className="ri-facebook-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
              </Form.Group>
            </Form.Group>
          </Col>

          <Col lg={6}>
            <Form.Group className="mb-4">
              <label className="label text-secondary">X</label>
              <Form.Group className="position-relative">
                <Form.Control
                  type="url"
                  className="text-dark ps-5 h-55"
                  defaultValue="https://x.com/"
                />
                <i className="ri-twitter-x-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
              </Form.Group>
            </Form.Group>
          </Col>

          <Col lg={6}>
            <Form.Group className="mb-4">
              <label className="label text-secondary">Linkedin</label>
              <Form.Group className="position-relative">
                <Form.Control
                  type="url"
                  className="text-dark ps-5 h-55"
                  defaultValue="https://www.linkedin.com/"
                />
                <i className="ri-linkedin-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
              </Form.Group>
            </Form.Group>
          </Col>

          <Col lg={6}>
            <Form.Group className="mb-4">
              <label className="label text-secondary">YouTube</label>
              <Form.Group className="position-relative">
                <Form.Control
                  type="url"
                  className="text-dark ps-5 h-55"
                  defaultValue="https://www.youtube.com/"
                />
                <i className="ri-youtube-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
              </Form.Group>
            </Form.Group>
          </Col>

          <Col lg={12}>
            <div className="d-flex flex-wrap gap-3">
              <button
                type="submit"
                className="btn btn-danger py-2 px-4 fw-medium fs-16 text-white"
              >
                Cancel
              </button>
              <button
                type="submit"
                className="btn btn-primary py-2 px-4 fw-medium fs-16"
              >
                {" "}
                <i className="ri-check-line text-white fw-medium"></i> Upload
                Profile
              </button>
            </div>
          </Col>
        </Row>
      </Form>
    </>
  );
};

export default AccountSettings;
