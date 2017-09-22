import { DespliegePage } from './app.po';

describe('despliege App', () => {
  let page: DespliegePage;

  beforeEach(() => {
    page = new DespliegePage();
  });

  it('should display welcome message', () => {
    page.navigateTo();
    expect(page.getParagraphText()).toEqual('Welcome to app!!');
  });
});
