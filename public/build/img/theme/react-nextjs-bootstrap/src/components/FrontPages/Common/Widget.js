"use client";

import Image from "next/image";

const Widget = () => {
  return (
    <>
      <div className="tailor-area position-relative z-1">
        <div className="container">
          <div className="row align-items-center">
            <div className="col-lg-6">
              <div className="tailor-img">
                <Image
                  src="/images/landing/tailor-img.png"
                  alt="tailor"
                  width={646}
                  height={592}
                />
              </div>
            </div>

            <div className="col-lg-6">
              <div className="tailor-content">
                <h2>
                  Tailor Your Dashboard: Unleash the Power of Customizable
                  Widgets
                </h2>

                <ul className="ps-0 mb-0 list-unstyled">
                  <li>
                    <div className="d-flex">
                      <div className="flex-shrink-0">
                        <i className="material-symbols-outlined text-primary fs-22">
                          done_outline
                        </i>
                      </div>
                      <div className="flex-grow-1 ms-3">
                        <h3>Tailored Display</h3>
                        <p>
                          Easily arrange, resize, and configure widgets to
                          showcase the data most relevant to your workflow.
                        </p>
                      </div>
                    </div>
                  </li>

                  <li>
                    <div className="d-flex">
                      <div className="flex-shrink-0">
                        <i className="material-symbols-outlined text-primary fs-22">
                          done_outline
                        </i>
                      </div>
                      <div className="flex-grow-1 ms-3">
                        <h3>Personalized Insights</h3>
                        <p>
                          Customize widget content and visualization options to
                          match your specific preferences and priorities.
                        </p>
                      </div>
                    </div>
                  </li>

                  <li>
                    <div className="d-flex">
                      <div className="flex-shrink-0">
                        <i className="material-symbols-outlined text-primary fs-22">
                          done_outline
                        </i>
                      </div>
                      <div className="flex-grow-1 ms-3">
                        <h3>Flexibility and Versatility</h3>
                        <p>
                          Adapt widgets to evolving business needs by adjusting
                          layouts, styles, and data sources with ease.
                        </p>
                      </div>
                    </div>
                  </li>

                  <li>
                    <div className="d-flex">
                      <div className="flex-shrink-0">
                        <i className="material-symbols-outlined text-primary fs-22">
                          done_outline
                        </i>
                      </div>
                      <div className="flex-grow-1 ms-3">
                        <h3>Seamless Integration</h3>
                        <p>
                          Integrate widgets seamlessly with other dashboard
                          components and external systems for a cohesive user
                          experience.
                        </p>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        {/* Shape Images */}
        <Image
          src="/images/landing/shape-1.png"
          className="shape shape-1"
          alt="shape"
          width={1130}
          height={1130}
        />
        <Image
          src="/images/landing/shape-2.png"
          className="shape shape-2"
          alt="shape"
          width={947}
          height={953}
        />
      </div>
    </>
  );
};

export default Widget;
