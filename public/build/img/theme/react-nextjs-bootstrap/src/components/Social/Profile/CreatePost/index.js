"use client";

import { Dropdown, Card, Form } from "react-bootstrap";
import Image from "next/image";

const CreatePost = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h3 className="mb-3 mb-lg-4">Create Post</h3>

          <Form>
            <div className="mb-4">
              <textarea
                className="form-control"
                rows="6"
                placeholder="What's on your mind, Alice Johnson?"
              ></textarea>
            </div>

            <div className="d-flex align-items-center gap-3">
              <button className="btn btn-primary py-2 px-3 align-items-center d-flex fs-16 fw-medium">
                <span className="material-symbols-outlined fs-22 text-white me-2">
                  send
                </span>

                <span className="py-1 d-none d-sm-inline-block">
                  Publish Post
                </span>
              </button>
              <button className="p-0 bg-transparent border-0 fs-20 text-body hover">
                <i className="ri-emotion-line"></i>
              </button>
              <button className="p-0 bg-transparent border-0 fs-20 text-body hover">
                <i className="ri-link-m"></i>
              </button>
              <button className="p-0 bg-transparent border-0 fs-20 text-body hover">
                <i className="ri-mic-line"></i>
              </button>
              <button className="p-0 bg-transparent border-0 fs-20 text-body hover">
                <i className="ri-image-line"></i>
              </button>
            </div>
          </Form>
        </Card.Body>
      </Card>

      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">
            <div className="d-flex align-items-center text-decoration-none">
              <div className="flex-shrink-0">
                <Image
                  src="/images/user-6.jpg"
                  className="wh-44 rounded-circle"
                  alt="user"
                  width={44}
                  height={44}
                />
              </div>
              <div className="flex-grow-1 ms-2 position-relative top-2">
                <h6 className="mb-0 fs-14 fw-medium">Cynthia Baggett</h6>
                <span className="fs-13 text-body">05 mins ago</span>
              </div>
            </div>

            <Dropdown className="action-opt">
              <Dropdown.Toggle
                variant="secondary"
                id="dropdown-basic"
                className="bg-transparent p-0"
              >
                <span className="material-symbols-outlined">more_horiz</span>
              </Dropdown.Toggle>

              <Dropdown.Menu className="bg-white border box-shadow">
                <Dropdown.Item href="#">Save Post</Dropdown.Item>

                <Dropdown.Item href="#">Hide Post</Dropdown.Item>

                <Dropdown.Item href="#">Report Photo</Dropdown.Item>

                <Dropdown.Item href="#">Block Cynthia</Dropdown.Item>
              </Dropdown.Menu>
            </Dropdown>
          </div>

          <p>
            Lorem Ipsum is simply dummy text of the printing and typesetting
            industry. Lorem Ipsum has been the industry standard dummy text ever
            since the 1500s, when an unknown printer took a galley of type and
            scrambled it to make a type specimen book.
          </p>
          <p>
            It has survived not only five centuries, but also the leap into
            electronic typesetting, remaining essentially unchanged. It was
            popularised in the 1960s with the release of Letraset sheets
            containing Lorem Ipsum passages, and more recently with desktop
            publishing software like Aldus PageMaker including versions.
          </p>

          <div className="border-top border-bottom py-2 my-4">
            <div className="d-flex align-items-center justify-content-between flex-wrap gap-2">
              <button className="p-0 bg-transparent border-0 fs-20 text-body hover align-items-center d-flex">
                <i className="ri-thumb-up-line"></i>
                <span className="fs-14 ms-2">10 Likes</span>
              </button>
              <button className="p-0 bg-transparent border-0 fs-20 text-body hover align-items-center d-flex">
                <i className="ri-chat-4-line"></i>
                <span className="fs-14 ms-2">0 Comments</span>
              </button>
              <button className="p-0 bg-transparent border-0 fs-20 text-body hover align-items-center d-flex">
                <i className="ri-share-line"></i>
                <span className="fs-14 ms-2">0 Share</span>
              </button>
            </div>
          </div>

          <Form>
            <div className="d-flex justify-content-between align-items-center">
              <div className="d-flex align-items-center text-decoration-none w-100">
                <div className="flex-shrink-0">
                  <Image
                    src="/images/user-68.jpg"
                    className="wh-44 rounded-circle"
                    alt="user"
                    width={44}
                    height={44}
                  />
                </div>
                <div className="flex-grow-1 ms-3 position-relative top-2">
                  <input
                    type="text"
                    className="form-control"
                    placeholder="Type something...."
                  />
                </div>
              </div>

              <div className="d-flex align-items-center gap-3 ms-3">
                <button className="p-0 bg-primary border-0 wh-44 lh-56 rounded-2">
                  <span className="material-symbols-outlined fs-22 text-white">
                    send
                  </span>
                </button>
                <button className="p-0 bg-transparent border-0 fs-20 text-body hover">
                  <i className="ri-emotion-line"></i>
                </button>
                <button className="p-0 bg-transparent border-0 fs-20 text-body hover">
                  <i className="ri-link-m"></i>
                </button>
              </div>
            </div>
          </Form>
        </Card.Body>
      </Card>

      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">
            <div className="d-flex align-items-center text-decoration-none">
              <div className="flex-shrink-0">
                <Image
                  src="/images/user-7.jpg"
                  className="wh-44 rounded-circle"
                  alt="user"
                  width={44}
                  height={44}
                />
              </div>
              <div className="flex-grow-1 ms-2 position-relative top-2">
                <h6 className="mb-0 fs-14 fw-medium">Douglas Hairston</h6>
                <span className="fs-13 text-body">1 hour ago</span>
              </div>
            </div>

            <Dropdown className="action-opt">
              <Dropdown.Toggle
                variant="secondary"
                id="dropdown-basic"
                className="bg-transparent p-0"
              >
                <span className="material-symbols-outlined">more_horiz</span>
              </Dropdown.Toggle>

              <Dropdown.Menu className="bg-white border box-shadow">
                <Dropdown.Item href="#">Save Post</Dropdown.Item>

                <Dropdown.Item href="#">Hide Post</Dropdown.Item>

                <Dropdown.Item href="#">Report Photo</Dropdown.Item>

                <Dropdown.Item href="#">Block Cynthia</Dropdown.Item>
              </Dropdown.Menu>
            </Dropdown>
          </div>

          <p>
            It was popularised in the 1960s with the release of Letraset sheets
            containing Lorem Ipsum passages, and more recently with desktop
            publishing software like Aldus PageMaker including versions of lorem
            ipsum.
          </p>

          <div className="border-top border-bottom py-2 my-4">
            <div className="d-flex align-items-center justify-content-between flex-wrap gap-2">
              <button className="p-0 bg-transparent border-0 fs-20 text-body hover align-items-center d-flex">
                <i className="ri-thumb-up-line"></i>
                <span className="fs-14 ms-2">42 Likes</span>
              </button>

              <button className="p-0 bg-transparent border-0 fs-20 text-body hover align-items-center d-flex">
                <i className="ri-chat-4-line"></i>
                <span className="fs-14 ms-2">2 Comments</span>
              </button>

              <button className="p-0 bg-transparent border-0 fs-20 text-body hover align-items-center d-flex">
                <i className="ri-share-line"></i>
                <span className="fs-14 ms-2">1 Share</span>
              </button>
            </div>
          </div>

          <Form>
            <div className="d-flex justify-content-between align-items-center">
              <div className="d-flex align-items-center text-decoration-none w-100">
                <div className="flex-shrink-0">
                  <Image
                    src="/images/user-68.jpg"
                    className="wh-44 rounded-circle"
                    alt="user"
                    width={44}
                    height={44}
                  />
                </div>

                <div className="flex-grow-1 ms-3 position-relative top-2">
                  <input
                    type="text"
                    className="form-control"
                    placeholder="Type something...."
                  />
                </div>
              </div>

              <div className="d-flex align-items-center gap-3 ms-3">
                <button className="p-0 bg-primary border-0 wh-44 lh-56 rounded-2">
                  <span className="material-symbols-outlined fs-22 text-white">
                    send
                  </span>
                </button>

                <button className="p-0 bg-transparent border-0 fs-20 text-body hover">
                  <i className="ri-emotion-line"></i>
                </button>

                <button className="p-0 bg-transparent border-0 fs-20 text-body hover">
                  <i className="ri-link-m"></i>
                </button>
              </div>
            </div>
          </Form>
        </Card.Body>
      </Card>

      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">
            <div className="d-flex align-items-center text-decoration-none">
              <div className="flex-shrink-0">
                <Image
                  src="/images/user-8.jpg"
                  className="wh-44 rounded-circle"
                  alt="user"
                  width={44}
                  height={44}
                />
              </div>
              <div className="flex-grow-1 ms-2 position-relative top-2">
                <h6 className="mb-0 fs-14 fw-medium">Olivia John</h6>
                <span className="fs-13 text-body">1 day ago</span>
              </div>
            </div>

            <Dropdown className="action-opt">
              <Dropdown.Toggle
                variant="secondary"
                id="dropdown-basic"
                className="bg-transparent p-0"
              >
                <span className="material-symbols-outlined">more_horiz</span>
              </Dropdown.Toggle>

              <Dropdown.Menu className="bg-white border box-shadow">
                <Dropdown.Item href="#">Save Post</Dropdown.Item>

                <Dropdown.Item href="#">Hide Post</Dropdown.Item>

                <Dropdown.Item href="#">Report Photo</Dropdown.Item>

                <Dropdown.Item href="#">Block Cynthia</Dropdown.Item>
              </Dropdown.Menu>
            </Dropdown>
          </div>

          <p>
            Lorem Ipsum is simply dummy text of the printing and typesetting
            industry. Lorem Ipsum has been the industry standard dummy text ever
            since the 1500s, when an unknown printer took a galley of type and
            scrambled it to make a type specimen book. It has survived not only
            five centuries, but also the leap into electronic typesetting,
            remaining essentially unchanged.
          </p>

          <div className="border-top border-bottom py-2 my-4">
            <div className="d-flex align-items-center justify-content-between flex-wrap gap-2">
              <button className="p-0 bg-transparent border-0 fs-20 text-body hover align-items-center d-flex">
                <i className="ri-thumb-up-line"></i>
                <span className="fs-14 ms-2">100 Likes</span>
              </button>

              <button className="p-0 bg-transparent border-0 fs-20 text-body hover align-items-center d-flex">
                <i className="ri-chat-4-line"></i>
                <span className="fs-14 ms-2">16 Comments</span>
              </button>

              <button className="p-0 bg-transparent border-0 fs-20 text-body hover align-items-center d-flex">
                <i className="ri-share-line"></i>
                <span className="fs-14 ms-2">5 Share</span>
              </button>
            </div>
          </div>

          <Form>
            <div className="d-flex justify-content-between align-items-center">
              <div className="d-flex align-items-center text-decoration-none w-100">
                <div className="flex-shrink-0">
                  <Image
                    src="/images/user-68.jpg"
                    className="wh-44 rounded-circle"
                    alt="user"
                    width={44}
                    height={44}
                  />
                </div>

                <div className="flex-grow-1 ms-3 position-relative top-2">
                  <input
                    type="text"
                    className="form-control"
                    placeholder="Type something...."
                  />
                </div>
              </div>

              <div className="d-flex align-items-center gap-3 ms-3">
                <button className="p-0 bg-primary border-0 wh-44 lh-56 rounded-2">
                  <span className="material-symbols-outlined fs-22 text-white">
                    send
                  </span>
                </button>

                <button className="p-0 bg-transparent border-0 fs-20 text-body hover">
                  <i className="ri-emotion-line"></i>
                </button>

                <button className="p-0 bg-transparent border-0 fs-20 text-body hover">
                  <i className="ri-link-m"></i>
                </button>
              </div>
            </div>
          </Form>
        </Card.Body>
      </Card>

      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center border-bottom pb-3 mb-2">
            <div className="d-flex align-items-center text-decoration-none">
              <div className="flex-shrink-0">
                <Image
                  src="/images/user-8.jpg"
                  className="wh-44 rounded-circle"
                  alt="user"
                  width={44}
                  height={44}
                />
              </div>
              <div className="flex-grow-1 ms-2 position-relative top-2">
                <h6 className="mb-0 fs-14 fw-medium">Olivia John</h6>
                <span className="fs-13 text-body">1 day ago</span>
              </div>
            </div>

            <Dropdown className="action-opt">
              <Dropdown.Toggle
                variant="secondary"
                id="dropdown-basic"
                className="bg-transparent p-0"
              >
                <span className="material-symbols-outlined">more_horiz</span>
              </Dropdown.Toggle>

              <Dropdown.Menu className="bg-white border box-shadow">
                <Dropdown.Item href="#">Save Post</Dropdown.Item>

                <Dropdown.Item href="#">Hide Post</Dropdown.Item>

                <Dropdown.Item href="#">Report Photo</Dropdown.Item>

                <Dropdown.Item href="#">Block Cynthia</Dropdown.Item>
              </Dropdown.Menu>
            </Dropdown>
          </div>

          <p>Our Author Products</p>

          <div className="row">
            <div className="col-lg-6 col-sm-6">
              <Image
                src="/images/product-6.jpg"
                className="rounded-3"
                alt="product"
                width={600}
                height={600}
              />
            </div>

            <div className="col-lg-6 col-sm-6 mt-4 mt-sm-0">
              <Image
                src="/images/product-7.jpg"
                className="rounded-3"
                alt="product"
                width={600}
                height={600}
              />
            </div>
          </div>

          <div className="border-top border-bottom py-2 my-4">
            <div className="d-flex align-items-center justify-content-between flex-wrap gap-2">
              <button className="p-0 bg-transparent border-0 fs-20 text-body hover align-items-center d-flex">
                <i className="ri-thumb-up-line"></i>
                <span className="fs-14 ms-2">150 Likes</span>
              </button>

              <button className="p-0 bg-transparent border-0 fs-20 text-body hover align-items-center d-flex">
                <i className="ri-chat-4-line"></i>
                <span className="fs-14 ms-2">17 Comments</span>
              </button>

              <button className="p-0 bg-transparent border-0 fs-20 text-body hover align-items-center d-flex">
                <i className="ri-share-line"></i>
                <span className="fs-14 ms-2">7 Share</span>
              </button>
            </div>
          </div>

          <Form>
            <div className="d-flex justify-content-between align-items-center">
              <div className="d-flex align-items-center text-decoration-none w-100">
                <div className="flex-shrink-0">
                  <Image
                    src="/images/user-68.jpg"
                    className="wh-44 rounded-circle"
                    alt="user"
                    width={44}
                    height={44}
                  />
                </div>

                <div className="flex-grow-1 ms-3 position-relative top-2">
                  <input
                    type="text"
                    className="form-control"
                    placeholder="Type something...."
                  />
                </div>
              </div>

              <div className="d-flex align-items-center gap-3 ms-3">
                <button className="p-0 bg-primary border-0 wh-44 lh-56 rounded-2">
                  <span className="material-symbols-outlined fs-22 text-white">
                    send
                  </span>
                </button>

                <button className="p-0 bg-transparent border-0 fs-20 text-body hover">
                  <i className="ri-emotion-line"></i>
                </button>

                <button className="p-0 bg-transparent border-0 fs-20 text-body hover">
                  <i className="ri-link-m"></i>
                </button>
              </div>
            </div>
          </Form>
        </Card.Body>
      </Card>
    </>
  );
};

export default CreatePost;
